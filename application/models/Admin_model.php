 <?php

class Admin_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    public function getAllUserPaymentTransactions()
    {
        $data = FALSE;
        $this->db->select("payments.*,subscriptions.duration,subscriptions.title, created, currency.unicode, CONCAT(users.first_name,' ', users.last_name) as username");
        $this->db->join('subscriptions', "subscriptions.id = payments.subscription_id");
        $this->db->join('currency', "currency.name = subscriptions.currency", 'left');
        $this->db->join('users', "users.id = payments.user_id", 'left');
        $this->db->order_by('payments.payment_id', 'DESC');
        $result = $this->db->get('payments');

        if ($result) {
            if ($result->num_rows() > 0) {
                $data = $result->result();
            } else {
                $data = FALSE;
            }
        }
        return $data;
    }

    public function getTotalEarningAmount()
    {
        $this->db->select('SUM(grand_total) AS mainTotal');
        $result = $this->db->get('payments');
        if ($result) {
            if ($result->num_rows() > 0) {
                return $result->result_array();
            } else {
                return FALSE;
            }
        } else {
            return FALSE;
        }
    }
    public function selectGetParamsfromOfferurl()
    {
        $this->db->distinct();
        $this->db->select('ExtraGetParams');
        $this->db->where('ExtraGetParams is NOT NULL', NULL, FALSE);
        $result = $this->db->get('offers');

        if ($result) {
            if ($result->num_rows() > 0) {
                return  $result->result_array();
            } else {
                return FALSE;
            }
        } else {
            return FALSE;
        }
    }
    public function getSettings()
    {
        $query = $this->db->get_where('settings', array('id' => 1));
        if ($query && $query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }
    }

    public function updateSettings($data = array())
    {
        $this->db->where('id', 1, 1);
        $uQuery = $this->db->update('settings', $data);
        if ($uQuery) {
            return true;
        } else {
            return false;
        }
    }

    public function getAllGeoCodes()
    {
        $data = FALSE;
        $result = $this->db->get('geo_codes');
        if ($result) {
            if ($result->num_rows() > 0) {
                $data = $result->result();
            } else {
                $data = FALSE;
            }
        }
        return $data;
    }

    public function getAllOffers()
    {
        $data = FALSE;
        // $this->db->select("offers.*,CONCAT(geo_codes.country,' (',geo_codes.iso_code_2,')') as geo_code");
        // $this->db->join('geo_codes', "geo_codes.iso_code_2 = offers.geo_code", 'left');
        // $this->db->order_by('offers.id', 'DESC');
        $this->db->select("offers.*");

        $result = $this->db->get('offers');
        if ($result) {
            if ($result->num_rows() > 0) {
                $data = $result->result();
            } else {
                $data = FALSE;
            }
        }
        return $data;
    }
    public function getAllCompletedOffers($id = NULL)
    {
        if ($id) {
            $this->db->select('offers.id,offers.name,offers.url,offers.description,offers.is_active,offers.image,completed_offer.created,users.first_name,users.last_name');
            $this->db->from('offers');
            $this->db->join('completed_offer', 'completed_offer.offer_id=offers.id');
            $this->db->join('users', 'completed_offer.user_id=users.id');
            $this->db->where('user_id', $id);
            $query = $this->db->get();
            $getresult = $query->result_array();
            $countofrow = $query->num_rows();
            if ($countofrow > 0) {
                return $getresult;
            } else {
                return FALSE;
            }
        } else {
            $this->db->select('offers.id,offers.name,offers.url,offers.description,offers.is_active,offers.image,completed_offer.created,users.first_name,users.last_name');
            $this->db->from('offers');
            $this->db->join('completed_offer', 'completed_offer.offer_id=offers.id');
            $this->db->join('users', 'completed_offer.user_id=users.id');
            $query = $this->db->get();
            $getresult = $query->result_array();
            $countofrow = $query->num_rows();
            if ($countofrow > 0) {
                return $getresult;
            } else {
                return FALSE;
            }
        }
    }
    public function addOffer($data = array())
    {
        $iQuery = $this->db->insert('offers', $data);
        if ($iQuery) {
            return true;
        } else {
            return false;
        }
    }

    public function getOfferByID($id = NULL)
    {
        $query = $this->db->get_where('offers', array('id' => $id), 1);

        if ($query && $query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }
    }

    public function updateOffer($id = NULL, $data = array())
    {
        $this->db->where('id', $id, 1);
        $uQuery = $this->db->update('offers', $data);

        if ($uQuery) {
            return true;
        } else {
            return false;
        }
    }

    public function deleteOffer($id = NULL)
    {
        $dQuery = $this->db->delete('offers', array('id' => $id));
        if ($dQuery) {
            return true;
        } else {
            return false;
        }
    }

    public function addUserCompletedOffer($data)
    {
        $iQuery = $this->db->insert('completed_offer', $data);
        if ($iQuery) {
            return true;
        } else {
            return false;
        }
    }

    public function getUsersCompletedOffer($id = NULL, $paystub_country_id = NULL, $limit = NULL)
    {
        if ($paystub_country_id) {
            $this->db->where('paystub_country_id', $paystub_country_id);
        }
        if ($limit) {
            $this->db->limit($limit);
        }
        $this->db->where('user_id', $id);
        $this->db->where('is_rewarded', 0);
        $query = $this->db->get('completed_offer');
        if ($query && $query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function updateUsersCompletedOffer($id = NULL, $data = array())
    {
        $this->db->where('id', $id, 1);
        $uQuery = $this->db->update('completed_offer', $data);

        if ($uQuery) {
            return true;
        } else {
            return false;
        }
    }

    public function getGeoCodeByISO2($geo_code = NULL)
    {
        $query = $this->db->get_where('geo_codes', array('iso_code_2' => $geo_code), 1);
        if ($query && $query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }
    }

    public function addTrackOffer($data = array())
    {
        $iQuery = $this->db->insert('track_offer', $data);
        if ($iQuery) {
            return true;
        } else {
            return false;
        }
    }

    public function getCompletedOfferByDate($limit = NULL)
    {
        if ($limit) {
            $this->db->limit($limit);
        }
        $this->db->select('COUNT(*) as totalRecord, created');
        $this->db->order_by('created', 'DESC');
        $this->db->group_by(array('YEAR(created)', 'MONTH(created)'));
        $query = $this->db->get('completed_offer');

        if ($query && $query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function getTrackOfferByDate($limit = NULL, $geo_code = NULL)
    {
        if ($limit) {
            $this->db->limit($limit);
        }
        if ($geo_code && $geo_code != 'all') {
            $this->db->where('geo_code', $geo_code);
        }
        $this->db->select('COUNT(*) as totalRecord, created');
        $this->db->order_by('created', 'DESC');
        $this->db->group_by(array('YEAR(created)', 'MONTH(created)'));
        $query = $this->db->get('track_offer');

        if ($query && $query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function getTotalUserCount()
    {
        $this->db->select('COUNT(*) as totalUser');
        $query = $this->db->get('users');
        if ($query && $query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }
    }

    public function getTotalOfferCount()
    {
        $this->db->select('COUNT(*) as totalOffers');
        $query = $this->db->get('offers');
        if ($query && $query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }
    }

    public function getTotalCompletedOfferCount()
    {
        $this->db->select('COUNT(*) as totalCompletedOffer');
        $query = $this->db->get('completed_offer');
        if ($query && $query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }
    }

    public function getTotalTrackOfferCount()
    {
        $this->db->select('COUNT(*) as totalTrackOffer');
        $query = $this->db->get('track_offer');
        if ($query && $query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }
    }
    public function getactiveusers()
    {
        $this->db->select('email');
        $this->db->from('users');
        $this->db->where('is_login', '1');
        $query = $this->db->get();
        if ($query && $query->num_rows() > 0) {
            return $query->result();;
        } else {
            return false;
        }
    }
}
