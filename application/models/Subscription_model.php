 <?php

class Subscription_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
        $this->table = 'subscriptions';
        $this->currency_table = 'currency';
        $this->tax_table = 'tax';
        $this->colors_table = 'colors';
        $this->_users_subscription = 'users_subscription';
        $this->_users_subscription_log = 'users_subscription_log';
        $this->dateFormat = date("Y-m-d H:i:s");
    }

    public function getSubscriptionDetails($id)
    {
        $q = $this->db->get_where($this->table, array('id' => $id), 1);
        if ($q->num_rows() > 0) {
            $datas = $q->result();
            foreach ($datas as $values) {
                $data[] = $values;
            }
            return $data;
        }
        return false;
    }

    public function getAllSubscription()
    {
        $data = FALSE;
        $this->db->select("$this->table.*");
        $result = $this->db->get($this->table);
        if ($result) {
            if ($result->num_rows() > 0) {
                $data = $result->result();
            } else {
                $data = FALSE;
            }
        }
        return $data;
    }

    public function getAllPaystubCountries()
    {
        $data = FALSE;
        $this->db->select("paystub_countries.*");
        $result = $this->db->get('paystub_countries');
        if ($result) {
            if ($result->num_rows() > 0) {
                $data = $result->result();
            } else {
                $data = FALSE;
            }
        }
        return $data;
    }

    public function getAllCurrency()
    {
        $data = FALSE;
        $this->db->select("$this->currency_table.*");
        $result = $this->db->get($this->currency_table);
        if ($result) {
            if ($result->num_rows() > 0) {
                $data = $result->result();
            } else {
                $data = FALSE;
            }
        }
        return $data;
    }

    public function getAllTax()
    {
        $data = FALSE;
        $this->db->select("$this->tax_table.*");
        //        $this->db->where_not_in('id', array('1', '2', '3'));
        $result = $this->db->get($this->tax_table);

        if ($result) {
            if ($result->num_rows() > 0) {
                $data = $result->result();
            } else {
                $data = FALSE;
            }
        }
        return $data;
    }

    public function getAllColors()
    {
        $data = FALSE;
        $this->db->select("$this->colors_table.*");
        $this->db->where('is_active', 1);
        $result = $this->db->get($this->colors_table);

        if ($result) {
            if ($result->num_rows() > 0) {
                $data = $result->result();
            } else {
                $data = FALSE;
            }
        }
        return $data;
    }

    public function addUserSubscription($data)
    {
        $data['created'] = $this->dateFormat;
        $data['modified'] = $this->dateFormat;
        $insert = $this->db->insert($this->_users_subscription, $data);
        $data['users_subscription_id'] = $this->db->insert_id();
        if ($insert) {
            $this->db->insert($this->_users_subscription_log, $data);
            return TRUE;
        }
    }

    public function checkAssignedSubscription($userId = NULL, $paystubCountryId = NULL, $limit = 10, $offset = 0)
    {

        $data = FALSE;
        $date = date('Y-m-d H:i:s');
        $this->db->select($this->table . ".title," . $this->_users_subscription . ".id as id, subscription_id, paystub_country_id, created, modified, is_active, is_expire, expire_date");
        $this->db->join($this->table, $this->table . ".id = $this->_users_subscription.subscription_id");
        $this->db->where('expire_date >= ', $date);
        if ($paystubCountryId) {
            $this->db->where('paystub_country_id', $paystubCountryId);
        }
        $this->db->where('user_id', $userId, 1);
        // $this->db->limit(10, 20);
        $result = $this->db->get($this->_users_subscription);


        if ($result) {
            if ($result->num_rows() > 0) {
                $data = $result->result();
            } else {
                $data = FALSE;
            }
        }
        return $data;
    }





    public function getAllUserSubscriptionByUserId($userId = NULL)
    {
        $data = FALSE;
        $this->db->select($this->table . ".title," . $this->table . ".duration," . $this->table . ".rate," . $this->table . ".currency, paystub_countries.name as paystubCountry, is_active, is_expire, expire_date, created, currency.unicode");
        $this->db->join($this->table, $this->table . ".id = $this->_users_subscription_log.subscription_id");
        $this->db->join('currency', "currency.name = $this->table.currency", 'left');
        $this->db->join('paystub_countries', "paystub_countries.id = $this->_users_subscription_log.paystub_country_id", 'left');
        $this->db->order_by($this->_users_subscription_log . '.id', 'DESC');
        $this->db->where('user_id', $userId);
        $result = $this->db->get($this->_users_subscription_log);

        if ($result) {
            if ($result->num_rows() > 0) {
                $data = $result->result();
            } else {
                $data = FALSE;
            }
        }
        return $data;
    }

    public function getAllUserPaymentTransactionByUserId($userId = NULL)
    {
        $data = FALSE;
        $this->db->select("payments.*," . $this->table . ".duration," . $this->table . ".title, created, currency.unicode");
        $this->db->join($this->table, $this->table . ".id = payments.subscription_id");
        $this->db->join('currency', "currency.name = $this->table.currency", 'left');
        $this->db->order_by('payments.payment_id', 'DESC');
        $this->db->where('user_id', $userId);
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

    public function updateSubscription($id = NULL, $data, $status)
    {
        $this->db->where('id', $id, 1);
        $result = $this->db->update($this->_users_subscription, $data);
        if ($result) {
            if ($status === 'renual') {
                $query = $this->db->get_where($this->_users_subscription, array('id' => $id));
                if ($query->num_rows() > 0) {
                    $data = $query->row_array();
                    $data['users_subscription_id'] = $data['id'];
                    unset($data['id']);
                    if ($data) {
                        $this->db->insert($this->_users_subscription_log, $data);
                    }
                }
            }
            $data = TRUE;
        } else {
            $data = FALSE;
        }
        return $data;
    }

    public function getCountryByName($name)
    {
        $q = $this->db->get_where('paystub_countries', array('name' => $name), 1);
        if ($q && $q->num_rows() > 0) {
            return $q->row();
        }
        return false;
    }

    public function addContact($data = array())
    {
        if ($this->db->insert('user_contacts', $data)) {
            return $this->db->insert_id();
        } else {
            return false;
        }
    }

    public function getISO3FromISO2($geo_codes = array(), $single_key = NULL)
    {
        $this->db->where_in('iso_code_2', $geo_codes);
        $query = $this->db->get('geo_codes');
        if ($query && $query->num_rows() > 0) {
            $data = array();
            if ($single_key) {
                foreach ($query->result() as $singleGeo) {
                    $data[] = $singleGeo->$single_key;
                }
                return $data;
            } else {
                return $query->result();
            }
        }
        return FALSE;
    }

    public function getGeoOffer($geo_code = NULL)
    {
        $query = $this->db->get_where('offers', array('is_active' => 1));
        $result = $query->result();
        $returnarray = array();
        if ($query && $query->num_rows() > 0) {
            foreach ($result as $single) {
                $geo_code_array = unserialize($single->geo_code);
                if (in_array($geo_code, $geo_code_array)) {
                    array_push($returnarray, $single);
                } else {
                    $iso3_geo_code = $this->getISO3FromISO2($geo_code_array, 'iso_code_3');
                    if (in_array($geo_code, $iso3_geo_code)) {
                        array_push($returnarray, $single);
                    }
                }
            }
            if ($returnarray) {
                return $returnarray;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function addCallback($data = array())
    {
        if ($this->db->insert('callbacks', $data)) {
            return $this->db->insert_id();
        } else {
            return false;
        }
    }
    public function getPaystubData($userId)
    {
        $SQL = 'SELECT u.id,u.first_name,u.last_name,u.company,u.email,u.phone,sub.title,pc.name as country_name,us.created,us.expire_date,paym.grand_total,paym.shipping_address,paym.txn_id FROM `users` as u,users_subscription us,paystub_countries pc,subscriptions sub,payments paym where u.id=us.user_id and  us.paystub_country_id <> 0 and us.paystub_country_id=pc.id and us.subscription_id=sub.id and u.id=paym.user_id and paym.subscription_id=us.subscription_id and us.user_id="' . $userId . '" and paym.payment_status="Success"';
        $query = $this->db->query($SQL);
        $result = $query->result_array();
        return $result;
    }
}
