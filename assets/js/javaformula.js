
function getNewFederalTaxRate(aa, e, tt, oo) {
    var a = parseInt(aa);
    var t = parseInt(tt);
    var o = parseInt(oo);
    var r = {
        subtract: 160.00,
        rate: 0.1
    };
    if (a) {
        var d = getNewFederalTaxArray(a);
        if (e in d) {
            var l = d[e][t];
            for (var p in l) {
                if (!(o > parseFloat(p))) return r;
                r = l[p]
            }
        }
    }
    return r
}

function getNewFederalTaxArray(a) {
    return 52 == a ? FTweekly : 26 == a ? FTbiweekly : 12 == a ? FTmonthly : 6 == a ? FTsemimonthly : FTweekly
}

var FTweekly = {
        single: [{
            0: {
                subtract: 73,
                rate: .1
            },
            260: {
                subtract: 104.17,
                rate: .12
            },
            832: {
                subtract: 435.00,
                rate: .22
            },
            1692: {
                subtract: 539.75,
                rate: .24
            },
            3164: {
                subtract: 1195.81,
                rate: .32
            },
            3998: {
                subtract: 1436.00,
                rate: .35
            },
            9887: {
                subtract: 1892.81,
                rate: .37
            }
        }, {
            0: {
                subtract: 153.80,
                rate: .1
            },
            340.80: {
                subtract: 184.97,
                rate: .12
            },
            912.80: {
                subtract: 515.80,
                rate: .22
            },
            1772.80: {
                subtract: 620.55,
                rate: .24
            },
            3244.80: {
                subtract: 1276.61,
                rate: .32
            },
            4078.80: {
                subtract: 1516.80,
                rate: .35
            },
            9967.80: {
                subtract: 1973.61,
                rate: .37
            }
        }, {
            0: {
                subtract: 234.60,
                rate: .1
            },
            421.60: {
                subtract: 265.77,
                rate: .12
            },
            993.60: {
                subtract: 596.60,
                rate: .22
            },
            1853.60: {
                subtract: 701.35,
                rate: .24
            },
            3325.60: {
                subtract: 1353.41,
                rate: .32
            },
            4159.60: {
                subtract: 1597.60,
                rate: .35
            },
            10048.60: {
                subtract: 2054.41,
                rate: .37
            }
        }, {
            0: {
                subtract: 315.40,
                rate: .1
            },
            502.40: {
                subtract: 346.57,
                rate: .12
            },
            1074.40: {
                subtract: 677.40,
                rate: .22
            },
            1934.40: {
                subtract: 782.15,
                rate: .24
            },
            3406.40: {
                subtract: 1438.21,
                rate: .32
            },
            4240.40: {
                subtract: 1678.40,
                rate: .35
            },
            10129.40: {
                subtract: 2135.21,
                rate: .37
            }
        }, {
            0: {
                subtract: 396.20,
                rate: .1
            },
            583.20: {
                subtract: 427.37,
                rate: .12
            },
            1155.20: {
                subtract: 758.20,
                rate: .22
            },
            2015.20: {
                subtract: 862.95,
                rate: .24
            },
            3487.20: {
                subtract: 1519.01,
                rate: .32
            },
            4321.20: {
                subtract: 1759.20,
                rate: .35
            },
            10210.20: {
                subtract: 2216.01,
                rate: .37
            }
        }, {
            0: {
                subtract: 477,
                rate: .1
            },
            664: {
                subtract: 508.17,
                rate: .12
            },
            1236: {
                subtract: 839,
                rate: .22
            },
            2096: {
                subtract: 943.75,
                rate: .24
            },
            3568: {
                subtract: 1599.81,
                rate: .32
            },
            4402: {
                subtract: 1840,
                rate: .35
            },
            10291: {
                subtract: 2296.81,
                rate: .37
            }
        }, {
            0: {
                subtract: 557.80,
                rate: .1
            },
            744.80: {
                subtract: 588.97,
                rate: .12
            },
            1316.80: {
                subtract: 919.80,
                rate: .22
            },
            2176.80: {
                subtract: 1024.55,
                rate: .24
            },
            3648.80: {
                subtract: 1680.61,
                rate: .32
            },
            4482.80: {
                subtract: 1920.80,
                rate: .35
            },
            10371.80: {
                subtract: 2377.61,
                rate: .37
            }
        }, {
            0: {
                subtract: 638.60,
                rate: .1
            },
            825.60: {
                subtract: 669.77,
                rate: .12
            },
            1397.60: {
                subtract: 1000.60,
                rate: .22
            },
            2257.60: {
                subtract: 1105.35,
                rate: .24
            },
            3729.60: {
                subtract: 1761.41,
                rate: .32
            },
            4563.60: {
                subtract: 2001.60,
                rate: .35
            },
            10452.60: {
                subtract: 2458.41,
                rate: .37
            }
        }, {
            0: {
                subtract: 719.40,
                rate: .1
            },
            906.40: {
                subtract: 750.57,
                rate: .12
            },
            1478.40: {
                subtract: 1081.40,
                rate: .22
            },
            2338.40: {
                subtract: 1186.15,
                rate: .24
            },
            3810.40: {
                subtract: 1842.21,
                rate: .32
            },
            4644.40: {
                subtract: 2082.40,
                rate: .35
            },
            10533.40: {
                subtract: 2539.21,
                rate: .37
            }
        }, {
            0: {
                subtract: 800.20,
                rate: .1
            },
            987.20: {
                subtract: 831.37,
                rate: .12
            },
            1559.20: {
                subtract: 1162.20,
                rate: .22
            },
            2419.20: {
                subtract: 1266.95,
                rate: .24
            },
            3891.20: {
                subtract: 1923.01,
                rate: .32
            },
            4725.20: {
                subtract: 2163.20,
                rate: .35
            },
            10614.20: {
                subtract: 2620.01,
                rate: .37
            }
        }],
        married: [{
            0: {
                subtract: 227,
                rate: .1
            },
            600: {
                subtract: 289.17,
                rate: .12
            },
            1745: {
                subtract: 950.91,
                rate: .22
            },
            3465: {
                subtract: 1160.42,
                rate: .24
            },
            6409: {
                subtract: 2472.56,
                rate: .32
            },
            8077: {
                subtract: 2952.94,
                rate: .35
            },
            12003: {
                subtract: 3442.14,
                rate: .37
            }
        }, {
            0: {
                subtract: 307.80,
                rate: .1
            },
            680.80: {
                subtract: 369.97,
                rate: .12
            },
            1825.80: {
                subtract: 1031.71,
                rate: .22
            },
            3545.80: {
                subtract: 1241.22,
                rate: .24
            },
            6489.80: {
                subtract: 2553.36,
                rate: .32
            },
            8157.80: {
                subtract: 3033.74,
                rate: .35
            },
            12083.80: {
                subtract: 3522.94,
                rate: .37
            }
        }, {
            0: {
                subtract: 388.60,
                rate: .1
            },
            761.60: {
                subtract: 450.77,
                rate: .12
            },
            1906.60: {
                subtract: 1112.51,
                rate: .22
            },
            3626.60: {
                subtract: 1322.02,
                rate: .24
            },
            6570.60: {
                subtract: 2634.16,
                rate: .32
            },
            8238.60: {
                subtract: 3114.54,
                rate: .35
            },
            12164.60: {
                subtract: 3603.74,
                rate: .37
            }
        }, {
            0: {
                subtract: 469.40,
                rate: .1
            },
            842.40: {
                subtract: 531.57,
                rate: .12
            },
            1987.40: {
                subtract: 1193.31,
                rate: .22
            },
            3707.40: {
                subtract: 1402.82,
                rate: .24
            },
            6651.40: {
                subtract: 2714.96,
                rate: .32
            },
            8319.40: {
                subtract: 3195.34,
                rate: .35
            },
            12245.40: {
                subtract: 3684.54,
                rate: .37
            }
        }, {
            0: {
                subtract: 550.20,
                rate: .1
            },
            923.20: {
                subtract: 612.37,
                rate: .12
            },
            2068.20: {
                subtract: 1274.11,
                rate: .22
            },
            3788.20: {
                subtract: 1483.62,
                rate: .24
            },
            6732.20: {
                subtract: 2795.76,
                rate: .32
            },
            8400.20: {
                subtract: 3276.14,
                rate: .35
            },
            12326.20: {
                subtract: 3765.34,
                rate: .37
            }
        }, {
            0: {
                subtract: 631,
                rate: .1
            },
            1004: {
                subtract: 693.17,
                rate: .12
            },
            2149: {
                subtract: 1354.91,
                rate: .22
            },
            3869: {
                subtract: 1564.42,
                rate: .24
            },
            6813: {
                subtract: 2876.56,
                rate: .32
            },
            8481: {
                subtract: 3356.94,
                rate: .35
            },
            12407: {
                subtract: 3846.14,
                rate: .37
            }
        }, {
            0: {
                subtract: 711.80,
                rate: .1
            },
            1084.80: {
                subtract: 773.97,
                rate: .12
            },
            2229.80: {
                subtract: 1435.71,
                rate: .22
            },
            3949.80: {
                subtract: 1645.22,
                rate: .24
            },
            6893.80: {
                subtract: 2957.36,
                rate: .32
            },
            8561.80: {
                subtract: 3437.74,
                rate: .35
            },
            12487.80: {
                subtract: 3926.94,
                rate: .37
            }
        }, {
            0: {
                subtract: 792.60,
                rate: .1
            },
            1165.60: {
                subtract: 854.77,
                rate: .12
            },
            2310.60: {
                subtract: 1516.51,
                rate: .22
            },
            4030.60: {
                subtract: 1726.02,
                rate: .24
            },
            6974.60: {
                subtract: 3038.16,
                rate: .32
            },
            8642.60: {
                subtract: 3518.54,
                rate: .35
            },
            12568.60: {
                subtract: 4007.74,
                rate: .37
            }
        }, {
            0: {
                subtract: 873.40,
                rate: .1
            },
            1246.40: {
                subtract: 935.57,
                rate: .12
            },
            2391.40: {
                subtract: 1597.31,
                rate: .22
            },
            4111.40: {
                subtract: 1806.82,
                rate: .24
            },
            7055.40: {
                subtract: 3118.96,
                rate: .32
            },
            8723.40: {
                subtract: 3599.34,
                rate: .35
            },
            12649.40: {
                subtract: 4088.54,
                rate: .37
            }
        }, {
            0: {
                subtract: 954.20,
                rate: .1
            },
            1327.20: {
                subtract: 1016.37,
                rate: .12
            },
            2472.20: {
                subtract: 1678.11,
                rate: .22
            },
            4192.20: {
                subtract: 1887.62,
                rate: .24
            },
            7136.20: {
                subtract: 3199.76,
                rate: .32
            },
            8804.20: {
                subtract: 3680.14,
                rate: .35
            },
            12730.20: {
                subtract: 4169.34,
                rate: .37
            }
        }]
    },
    FTbiweekly = {
        single: [{
            0: {
                subtract: 146,
                rate: .1
            },
            519: {
                subtract: 208.17,
                rate: .12
            },
            1664: {
                subtract: 869.91,
                rate: .22
            },
            3385: {
                subtract: 1079.50,
                rate: .24
            },
            6328: {
                subtract: 2391.63,
                rate: .32
            },
            7996: {
                subtract: 2872.00,
                rate: .35
            },
            19773: {
                subtract: 3785.57,
                rate: .37
            }
        }, {
            0: {
                subtract: 307.50,
                rate: .1
            },
            680.50: {
                subtract: 369.67,
                rate: .12
            },
            1825.50: {
                subtract: 1031.41,
                rate: .22
            },
            3546.50: {
                subtract: 1241.00,
                rate: .24
            },
            6489.50: {
                subtract: 2553.13,
                rate: .32
            },
            8157.50: {
                subtract: 3033.50,
                rate: .35
            },
            19934.50: {
                subtract: 3947.07,
                rate: .37
            }
        }, {
            0: {
                subtract: 469,
                rate: .1
            },
            842: {
                subtract: 531.17,
                rate: .12
            },
            1987: {
                subtract: 1192.91,
                rate: .22
            },
            3708: {
                subtract: 1402.50,
                rate: .24
            },
            6651: {
                subtract: 2714.63,
                rate: .32
            },
            8319: {
                subtract: 3195.00,
                rate: .35
            },
            20096: {
                subtract: 4108.57,
                rate: .37
            }
        }, {
            0: {
                subtract: 630.50,
                rate: .1
            },
            1003.50: {
                subtract: 692.67,
                rate: .12
            },
            2148.50: {
                subtract: 1354.41,
                rate: .22
            },
            3869.50: {
                subtract: 1564.00,
                rate: .24
            },
            6812.50: {
                subtract: 2876.13,
                rate: .32
            },
            8480.50: {
                subtract: 3356.50,
                rate: .35
            },
            20257.50: {
                subtract: 4270.07,
                rate: .37
            }
        }, {
            0: {
                subtract: 792,
                rate: .1
            },
            1165: {
                subtract: 854.17,
                rate: .12
            },
            2310: {
                subtract: 1515.91,
                rate: .22
            },
            4031: {
                subtract: 1725.50,
                rate: .24
            },
            6974: {
                subtract: 3037.63,
                rate: .32
            },
            8642: {
                subtract: 3518.00,
                rate: .35
            },
            20419: {
                subtract: 4431.57,
                rate: .37
            }
        }, {
            0: {
                subtract: 953.50,
                rate: .1
            },
            1326.50: {
                subtract: 1015.67,
                rate: .12
            },
            2471.50: {
                subtract: 1677.41,
                rate: .22
            },
            4192.50: {
                subtract: 1887.00,
                rate: .24
            },
            7135.50: {
                subtract: 3199.13,
                rate: .32
            },
            8803.50: {
                subtract: 3679.50,
                rate: .35
            },
            20580.50: {
                subtract: 4593.07,
                rate: .37
            }
        }, {
            0: {
                subtract: 1115,
                rate: .1
            },
            1488: {
                subtract: 1177.17,
                rate: .12
            },
            2633: {
                subtract: 1838.91,
                rate: .22
            },
            4354: {
                subtract: 2048.50,
                rate: .24
            },
            7297: {
                subtract: 3360.63,
                rate: .32
            },
            8965: {
                subtract: 3841.00,
                rate: .35
            },
            20742: {
                subtract: 4754.57,
                rate: .37
            }
        }, {
            0: {
                subtract: 1276.50,
                rate: .1
            },
            1649.50: {
                subtract: 1338.67,
                rate: .12
            },
            2794.50: {
                subtract: 2000.41,
                rate: .22
            },
            4515.50: {
                subtract: 2210.00,
                rate: .24
            },
            7458.50: {
                subtract: 3522.13,
                rate: .32
            },
            9126.50: {
                subtract: 4002.50,
                rate: .35
            },
            20903.50: {
                subtract: 4916.07,
                rate: .37
            }
        }, {
            0: {
                subtract: 1438,
                rate: .1
            },
            1811: {
                subtract: 1500.17,
                rate: .12
            },
            2956: {
                subtract: 2161.91,
                rate: .22
            },
            4677: {
                subtract: 2371.50,
                rate: .24
            },
            7620: {
                subtract: 3683.63,
                rate: .32
            },
            9288: {
                subtract: 4164.00,
                rate: .35
            },
            21065: {
                subtract: 5077.57,
                rate: .37
            }
        }, {
            0: {
                subtract: 1599.50,
                rate: .1
            },
            1972.50: {
                subtract: 1661.67,
                rate: .12
            },
            3117.50: {
                subtract: 2323.41,
                rate: .22
            },
            4838.50: {
                subtract: 2533.00,
                rate: .24
            },
            7781.50: {
                subtract: 3845.13,
                rate: .32
            },
            9449.50: {
                subtract: 4325.50,
                rate: .35
            },
            21226.50: {
                subtract: 5239.07,
                rate: .37
            }
        }],
        married: [{
            0: {
                subtract: 454,
                rate: .1
            },
            1200: {
                subtract: 578.33,
                rate: .12
            },
            3490: {
                subtract: 1901.82,
                rate: .22
            },
            6931: {
                subtract: 2320.92,
                rate: .24
            },
            12817: {
                subtract: 4944.94,
                rate: .32
            },
            16154: {
                subtract: 5905.71,
                rate: .35
            },
            24006: {
                subtract: 6884.11,
                rate: .37
            }
        }, {
            0: {
                subtract: 615.50,
                rate: .1
            },
            1361.50: {
                subtract: 739.83,
                rate: .12
            },
            3651.50: {
                subtract: 2063.32,
                rate: .22
            },
            7092.50: {
                subtract: 2482.42,
                rate: .24
            },
            12978.50: {
                subtract: 5106.44,
                rate: .32
            },
            16315.50: {
                subtract: 6067.21,
                rate: .35
            },
            24167.50: {
                subtract: 7045.61,
                rate: .37
            }
        }, {
            0: {
                subtract: 777,
                rate: .1
            },
            1523: {
                subtract: 901.33,
                rate: .12
            },
            3813: {
                subtract: 2224.82,
                rate: .22
            },
            7254: {
                subtract: 2643.93,
                rate: .24
            },
            13140: {
                subtract: 5267.94,
                rate: .32
            },
            16477: {
                subtract: 6228.71,
                rate: .35
            },
            24329: {
                subtract: 7207.11,
                rate: .37
            }
        }, {
            0: {
                subtract: 938.50,
                rate: .1
            },
            1684.50: {
                subtract: 1062.83,
                rate: .12
            },
            3974.50: {
                subtract: 2386.32,
                rate: .22
            },
            7415.50: {
                subtract: 2805.42,
                rate: .24
            },
            13301.50: {
                subtract: 5429.44,
                rate: .32
            },
            16638.50: {
                subtract: 6390.21,
                rate: .35
            },
            24490.50: {
                subtract: 7368.61,
                rate: .37
            }
        }, {
            0: {
                subtract: 1100,
                rate: .1
            },
            1846: {
                subtract: 1224.33,
                rate: .12
            },
            4136: {
                subtract: 2547.82,
                rate: .22
            },
            7577: {
                subtract: 2966.92,
                rate: .24
            },
            13463: {
                subtract: 5590.94,
                rate: .32
            },
            16800: {
                subtract: 6551.71,
                rate: .35
            },
            24652: {
                subtract: 7530.11,
                rate: .37
            }
        }, {
            0: {
                subtract: 1261.50,
                rate: .1
            },
            2007.50: {
                subtract: 1385.83,
                rate: .12
            },
            4297.50: {
                subtract: 2709.32,
                rate: .22
            },
            7738.50: {
                subtract: 3128.42,
                rate: .24
            },
            13624.50: {
                subtract: 5752.44,
                rate: .33
            },
            16961.50: {
                subtract: 6713.21,
                rate: .35
            },
            24813.50: {
                subtract: 7691.61,
                rate: .37
            }
        }, {
            0: {
                subtract: 1423,
                rate: .1
            },
            2169: {
                subtract: 1547.33,
                rate: .12
            },
            4459: {
                subtract: 2870.82,
                rate: .22
            },
            7900: {
                subtract: 3289.92,
                rate: .24
            },
            13786: {
                subtract: 5913.94,
                rate: .32
            },
            17123: {
                subtract: 6874.71,
                rate: .35
            },
            24975: {
                subtract: 7853.11,
                rate: .37
            }
        }, {
            0: {
                subtract: 1584.50,
                rate: .1
            },
            2330.50: {
                subtract: 1708.83,
                rate: .12
            },
            4620.50: {
                subtract: 3032.32,
                rate: .22
            },
            8061.50: {
                subtract: 3451.42,
                rate: .24
            },
            13947.50: {
                subtract: 6075.44,
                rate: .32
            },
            17284.50: {
                subtract: 7036.21,
                rate: .35
            },
            25136.50: {
                subtract: 8014.61,
                rate: .37
            }
        }, {
            0: {
                subtract: 1746,
                rate: .1
            },
            2492: {
                subtract: 1870.33,
                rate: .12
            },
            4782: {
                subtract: 3193.82,
                rate: .22
            },
            8223: {
                subtract: 3612.92,
                rate: .24
            },
            14109: {
                subtract: 6236.94,
                rate: .32
            },
            17446: {
                subtract: 7197.71,
                rate: .35
            },
            25298: {
                subtract: 8176.11,
                rate: .37
            }
        }, {
            0: {
                subtract: 1907.50,
                rate: .1
            },
            2653.50: {
                subtract: 2031.83,
                rate: .12
            },
            4943.50: {
                subtract: 3355.32,
                rate: .22
            },
            8384.50: {
                subtract: 3774.42,
                rate: .24
            },
            14270.50: {
                subtract: 6398.44,
                rate: .32
            },
            17607.50: {
                subtract: 7359.21,
                rate: .35
            },
            25459.50: {
                subtract: 8337.61,
                rate: .37
            }
        }]
    },
    FTsemimonthly = {
        single: [{
            0: {
                subtract: 158,
                rate: .1
            },
            563: {
                subtract: 225.50,
                rate: .12
            },
            1803: {
                subtract: 942.55,
                rate: .22
            },
            3667: {
                subtract: 1169.58,
                rate: .24
            },
            6855: {
                subtract: 2590.94,
                rate: .32
            },
            8663: {
                subtract: 3111.40,
                rate: .35
            },
            21421: {
                subtract: 4101.11,
                rate: .37
            }
        }, {
            0: {
                subtract: 333,
                rate: .1
            },
            "738": {
                subtract: 400.50,
                rate: .12
            },
            "1978": {
                subtract: 1117.55,
                rate: .22
            },
            "3842": {
                subtract: 1344.58,
                rate: .24
            },
            "7030": {
                subtract: 2765.94,
                rate: .32
            },
            "8838": {
                subtract: 3286.40,
                rate: .35
            },
            "21596": {
                subtract: 4276.11,
                rate: .37
            }
        }, {
            0: {
                subtract: 508,
                rate: .1
            },
            913: {
                subtract: 575.50,
                rate: .12
            },
            2153: {
                subtract: 1292.55,
                rate: .22
            },
            4017: {
                subtract: 1519.58,
                rate: .24
            },
            7205: {
                subtract: 2940.94,
                rate: .32
            },
            9013: {
                subtract: 3461.40,
                rate: .35
            },
            21771: {
                subtract: 4451.11,
                rate: .37
            }
        }, {
            0: {
                subtract: 683,
                rate: .1
            },
            "1088": {
                subtract: 750.50,
                rate: .12
            },
            "2328": {
                subtract: 1467.55,
                rate: .22
            },
            "4192": {
                subtract: 1694.58,
                rate: .24
            },
            "7380": {
                subtract: 3115.94,
                rate: .32
            },
            "9188": {
                subtract: 3636.40,
                rate: .35
            },
            "21946": {
                subtract: 4626.11,
                rate: .37
            }
        }, {
            0: {
                subtract: 858,
                rate: .1
            },
            1263: {
                subtract: 925.50,
                rate: .12
            },
            2503: {
                subtract: 1642.55,
                rate: .22
            },
            4367: {
                subtract: 1869.58,
                rate: .24
            },
            7555: {
                subtract: 3290.94,
                rate: .32
            },
            9363: {
                subtract: 3811.40,
                rate: .35
            },
            22121: {
                subtract: 4801.11,
                rate: .37
            }
        }, {
            0: {
                subtract: 1033,
                rate: .1
            },
            "1438": {
                subtract: 1100.50,
                rate: .12
            },
            "2678": {
                subtract: 1817.55,
                rate: .22
            },
            "4542": {
                subtract: 2044.58,
                rate: .24
            },
            "7730": {
                subtract: 3465.94,
                rate: .32
            },
            "9538": {
                subtract: 3986.40,
                rate: .35
            },
            "22296": {
                subtract: 4976.11,
                rate: .37
            }
        }, {
            0: {
                subtract: 1208,
                rate: .1
            },
            1613: {
                subtract: 1275.50,
                rate: .12
            },
            2853: {
                subtract: 1992.55,
                rate: .22
            },
            4717: {
                subtract: 2219.58,
                rate: .24
            },
            7905: {
                subtract: 3640.94,
                rate: .32
            },
            9713: {
                subtract: 4161.40,
                rate: .35
            },
            22471: {
                subtract: 5151.11,
                rate: .37
            }
        }, {
            0: {
                subtract: 1383,
                rate: .1
            },
            "1788": {
                subtract: 1450.50,
                rate: .12
            },
            "3028": {
                subtract: 2167.55,
                rate: .22
            },
            "4892": {
                subtract: 2394.58,
                rate: .24
            },
            "8080": {
                subtract: 3815.94,
                rate: .32
            },
            "9888": {
                subtract: 4336.40,
                rate: .35
            },
            "22646": {
                subtract: 5326.11,
                rate: .37
            }
        }, {
            0: {
                subtract: 1558,
                rate: .1
            },
            1963: {
                subtract: 1625.50,
                rate: .12
            },
            3203: {
                subtract: 2342.55,
                rate: .22
            },
            5067: {
                subtract: 2569.58,
                rate: .24
            },
            8255: {
                subtract: 3990.94,
                rate: .32
            },
            10063: {
                subtract: 4511.40,
                rate: .35
            },
            22821: {
                subtract: 5501.11,
                rate: .37
            }
        }, {
            0: {
                subtract: 1733,
                rate: .1
            },
            "2138": {
                subtract: 1800.50,
                rate: .12
            },
            "3378": {
                subtract: 2517.55,
                rate: .22
            },
            "5242": {
                subtract: 2744.58,
                rate: .24
            },
            "8430": {
                subtract: 4165.94,
                rate: .32
            },
            "10238": {
                subtract: 4686.40,
                rate: .35
            },
            "22996": {
                subtract: 5676.11,
                rate: .37
            }
        }],
        married: [{
            0: {
                subtract: 492,
                rate: .1
            },
            1300: {
                subtract: 626.67,
                rate: .12
            },
            3781: {
                subtract: 2060.45,
                rate: .22
            },
            7508: {
                subtract: 2514.42,
                rate: .24
            },
            13885: {
                subtract: 5357.06,
                rate: .32
            },
            17500: {
                subtract: 6397.89,
                rate: .35
            },
            26006: {
                subtract: 7457.78,
                rate: .37
            }
        }, {
            0: {
                subtract: 667,
                rate: .1
            },
            "1475": {
                subtract: 801.67,
                rate: .12
            },
            "3956": {
                subtract: 2235.45,
                rate: .22
            },
            "7683": {
                subtract: 2689.42,
                rate: .24
            },
            "14060": {
                subtract: 5532.06,
                rate: .32
            },
            "17675": {
                subtract: 6572.89,
                rate: .35
            },
            "26181": {
                subtract: 7632.78,
                rate: .37
            }
        }, {
            0: {
                subtract: 842,
                rate: .1
            },
            1650: {
                subtract: 976.67,
                rate: .12
            },
            4131: {
                subtract: 2410.45,
                rate: .22
            },
            7858: {
                subtract: 2864.42,
                rate: .24
            },
            14235: {
                subtract: 5707.06,
                rate: .32
            },
            17850: {
                subtract: 6747.89,
                rate: .35
            },
            26356: {
                subtract: 7807.78,
                rate: .37
            }
        }, {
            0: {
                subtract: 1017,
                rate: .1
            },
            "1825": {
                subtract: 1151.67,
                rate: .12
            },
            "4306": {
                subtract: 2585.45,
                rate: .22
            },
            "8033": {
                subtract: 3039.42,
                rate: .24
            },
            "14410": {
                subtract: 5882.06,
                rate: .32
            },
            "18025": {
                subtract: 6922.89,
                rate: .35
            },
            "26531": {
                subtract: 7982.78,
                rate: .37
            }
        }, {
            0: {
                subtract: 1192,
                rate: .1
            },
            2000: {
                subtract: 1326.67,
                rate: .12
            },
            4481: {
                subtract: 2760.45,
                rate: .22
            },
            8208: {
                subtract: 3214.42,
                rate: .24
            },
            14585: {
                subtract: 6059.06,
                rate: .32
            },
            18200: {
                subtract: 7097.89,
                rate: .35
            },
            26706: {
                subtract: 8157.78,
                rate: .37
            }
        }, {
            0: {
                subtract: 1369,
                rate: .1
            },
            "2175": {
                subtract: 1501.67,
                rate: .12
            },
            "4656": {
                subtract: 2935.45,
                rate: .22
            },
            "8383": {
                subtract: 3389.42,
                rate: .24
            },
            "14760": {
                subtract: 6232.06,
                rate: .32
            },
            "18375": {
                subtract: 7272.89,
                rate: .35
            },
            "26881": {
                subtract: 8332.78,
                rate: .37
            }
        }, {
            0: {
                subtract: 1542,
                rate: .1
            },
            2350: {
                subtract: 1678.67,
                rate: .12
            },
            4831: {
                subtract: 3110.45,
                rate: .22
            },
            8558: {
                subtract: 3564.42,
                rate: .24
            },
            14935: {
                subtract: 6407.06,
                rate: .32
            },
            18550: {
                subtract: 7447.89,
                rate: .35
            },
            27056: {
                subtract: 8507.78,
                rate: .37
            }
        }, {
            0: {
                subtract: 1717,
                rate: .1
            },
            "2525": {
                subtract: 1851.67,
                rate: .12
            },
            "5006": {
                subtract: 3285.45,
                rate: .22
            },
            "8733": {
                subtract: 3739.42,
                rate: .24
            },
            "15110": {
                subtract: 6582.06,
                rate: .32
            },
            "18725": {
                subtract: 7622.89,
                rate: .35
            },
            "27231": {
                subtract: 8682.78,
                rate: .37
            }
        }, {
            0: {
                subtract: 1892,
                rate: .1
            },
            2700: {
                subtract: 2026.67,
                rate: .12
            },
            5181: {
                subtract: 3460.45,
                rate: .22
            },
            8908: {
                subtract: 3914.42,
                rate: .24
            },
            15285: {
                subtract: 6757.06,
                rate: .32
            },
            18900: {
                subtract: 7797.89,
                rate: .35
            },
            27406: {
                subtract: 8857.78,
                rate: .37
            }
        }, {
            0: {
                subtract: 2067,
                rate: .1
            },
            "2875": {
                subtract: 2201.67,
                rate: .12
            },
            "5356": {
                subtract: 3635.45,
                rate: .22
            },
            "9083": {
                subtract: 4089.42,
                rate: .24
            },
            "15460": {
                subtract: 6932.06,
                rate: .32
            },
            "19075": {
                subtract: 7972.89,
                rate: .35
            },
            "27581": {
                subtract: 9032.78,
                rate: .37
            }
        }]
    },
    FTmonthly = {
        single: [{
            0: {
                subtract: 317,
                rate: .1
            },
            1125: {
                subtract: 451.67,
                rate: .12
            },
            3606: {
                subtract: 1885.45,
                rate: .22
            },
            7333: {
                subtract: 2339.42,
                rate: .24
            },
            13710: {
                subtract: 5182.06,
                rate: .32
            },
            17325: {
                subtract: 6222.89,
                rate: .35
            },
            42842: {
                subtract: 8202.30,
                rate: .37
            }
        }, {
            0: {
                subtract: 667,
                rate: .1
            },
            1475: {
                subtract: 801.67,
                rate: .12
            },
            3956: {
                subtract: 2235.45,
                rate: .22
            },
            7683: {
                subtract: 2689.42,
                rate: .24
            },
            14060: {
                subtract: 5532.06,
                rate: .32
            },
            17675: {
                subtract: 6572.89,
                rate: .35
            },
            43192: {
                subtract: 8552.30,
                rate: .37
            }
        }, {
            0: {
                subtract: 1017,
                rate: .1
            },
            1825: {
                subtract: 1151.67,
                rate: .12
            },
            4306: {
                subtract: 2585.45,
                rate: .22
            },
            8033: {
                subtract: 3039.42,
                rate: .24
            },
            14410: {
                subtract: 5882.06,
                rate: .32
            },
            18025: {
                subtract: 6922.89,
                rate: .35
            },
            43542: {
                subtract: 8902.30,
                rate: .37
            }
        }, {
            0: {
                subtract: 1369,
                rate: .1
            },
            2175: {
                subtract: 1501.67,
                rate: .12
            },
            4656: {
                subtract: 2935.45,
                rate: .22
            },
            8383: {
                subtract: 3389.42,
                rate: .24
            },
            14760: {
                subtract: 6232.06,
                rate: .32
            },
            18375: {
                subtract: 7272.89,
                rate: .35
            },
            43892: {
                subtract: 9252.30,
                rate: .37
            }
        }, {
            0: {
                subtract: 1717,
                rate: .1
            },
            2525: {
                subtract: 1851.87,
                rate: .12
            },
            5006: {
                subtract: 3285.45,
                rate: .22
            },
            8733: {
                subtract: 3739.42,
                rate: .24
            },
            15110: {
                subtract: 6582.06,
                rate: .32
            },
            18725: {
                subtract: 7622.89,
                rate: .35
            },
            44242: {
                subtract: 9602.30,
                rate: .37
            }
        }, {
            0: {
                subtract: 2067,
                rate: .1
            },
            2875: {
                subtract: 2201.67,
                rate: .12
            },
            5356: {
                subtract: 3635.45,
                rate: .22
            },
            9083: {
                subtract: 4089.42,
                rate: .24
            },
            15460: {
                subtract: 6932.06,
                rate: .32
            },
            19075: {
                subtract: 7972.89,
                rate: .35
            },
            44592: {
                subtract: 9952.30,
                rate: .37
            }
        }, {
            0: {
                subtract: 2417,
                rate: .1
            },
            3225: {
                subtract: 2551.67,
                rate: .12
            },
            5706: {
                subtract: 3985.45,
                rate: .22
            },
            9433: {
                subtract: 4439.42,
                rate: .24
            },
            15810: {
                subtract: 7282.06,
                rate: .32
            },
            19425: {
                subtract: 8322.89,
                rate: .35
            },
            44942: {
                subtract: 10302.30,
                rate: .37
            }
        }, {
            0: {
                subtract: 2767,
                rate: .1
            },
            3575: {
                subtract: 2901.67,
                rate: .12
            },
            6056: {
                subtract: 4335.45,
                rate: .22
            },
            9783: {
                subtract: 4789.42,
                rate: .24
            },
            16160: {
                subtract: 7632.06,
                rate: .32
            },
            19775: {
                subtract: 8672.89,
                rate: .35
            },
            45292: {
                subtract: 10652.30,
                rate: .37
            }
        }, {
            0: {
                subtract: 3117,
                rate: .1
            },
            3925: {
                subtract: 3251.67,
                rate: .12
            },
            6406: {
                subtract: 4685.45,
                rate: .22
            },
            10133: {
                subtract: 5139.42,
                rate: .24
            },
            16510: {
                subtract: 7982.06,
                rate: .32
            },
            20125: {
                subtract: 9022.89,
                rate: .35
            },
            45642: {
                subtract: 11002.30,
                rate: .37
            }
        }, {
            0: {
                subtract: 3467,
                rate: .1
            },
            4275: {
                subtract: 3601.67,
                rate: .12
            },
            6756: {
                subtract: 5035.45,
                rate: .22
            },
            10483: {
                subtract: 5489.42,
                rate: .24
            },
            16860: {
                subtract: 8332.06,
                rate: .32
            },
            20475: {
                subtract: 9372.89,
                rate: .35
            },
            45992: {
                subtract: 11352.30,
                rate: .37
            }
        }],
        married: [{
            0: {
                subtract: 983,
                rate: .1
            },
            2600: {
                subtract: 1252.50,
                rate: .12
            },
            7563: {
                subtract: 4120.91,
                rate: .22
            },
            15017: {
                subtract: 5028.92,
                rate: .24
            },
            27771: {
                subtract: 10714.44,
                rate: .32
            },
            35000: {
                subtract: 12796.06,
                rate: .35
            },
            52013: {
                subtract: 14915.89,
                rate: .37
            }
        }, {
            0: {
                subtract: 1333,
                rate: .1
            },
            2950: {
                subtract: 1602.50,
                rate: .12
            },
            7913: {
                subtract: 4470.91,
                rate: .22
            },
            15367: {
                subtract: 5378.92,
                rate: .24
            },
            28121: {
                subtract: 11064.44,
                rate: .32
            },
            35350: {
                subtract: 13146.06,
                rate: .35
            },
            52363: {
                subtract: 15265.89,
                rate: .37
            }
        }, {
            0: {
                subtract: 1683,
                rate: .1
            },
            3300: {
                subtract: 1952.50,
                rate: .12
            },
            8263: {
                subtract: 4820.91,
                rate: .22
            },
            15717: {
                subtract: 5728.92,
                rate: .24
            },
            28471: {
                subtract: 11414.44,
                rate: .32
            },
            35700: {
                subtract: 13496.06,
                rate: .35
            },
            52713: {
                subtract: 15615.89,
                rate: .37
            }
        }, {
            0: {
                subtract: 2033,
                rate: .1
            },
            3650: {
                subtract: 2302.50,
                rate: .12
            },
            8613: {
                subtract: 5170.91,
                rate: .22
            },
            16067: {
                subtract: 6078.92,
                rate: .24
            },
            28821: {
                subtract: 11764.44,
                rate: .32
            },
            36050: {
                subtract: 13846.06,
                rate: .35
            },
            53063: {
                subtract: 15965.89,
                rate: .37
            }
        }, {
            0: {
                subtract: 2383,
                rate: .1
            },
            4000: {
                subtract: 2652.50,
                rate: .12
            },
            8963: {
                subtract: 5520.91,
                rate: .22
            },
            16417: {
                subtract: 6428.92,
                rate: .24
            },
            29171: {
                subtract: 12114.44,
                rate: .32
            },
            36400: {
                subtract: 14196.06,
                rate: .35
            },
            53413: {
                subtract: 16315.89,
                rate: .37
            }
        }, {
            0: {
                subtract: 2733,
                rate: .1
            },
            4350: {
                subtract: 3002.50,
                rate: .12
            },
            9313: {
                subtract: 5870.91,
                rate: .22
            },
            16767: {
                subtract: 6778.92,
                rate: .24
            },
            29521: {
                subtract: 12464.44,
                rate: .32
            },
            36750: {
                subtract: 14546.06,
                rate: .35
            },
            53763: {
                subtract: 16665.89,
                rate: .37
            }
        }, {
            0: {
                subtract: 3083,
                rate: .1
            },
            4700: {
                subtract: 3352.50,
                rate: .12
            },
            9663: {
                subtract: 6220.91,
                rate: .22
            },
            17117: {
                subtract: 7128.92,
                rate: .24
            },
            29871: {
                subtract: 12814.44,
                rate: .32
            },
            37100: {
                subtract: 14896.06,
                rate: .35
            },
            54113: {
                subtract: 17015.89,
                rate: .37
            }
        }, {
            0: {
                subtract: 3433,
                rate: .1
            },
            5050: {
                subtract: 3702.50,
                rate: .12
            },
            10013: {
                subtract: 6570.91,
                rate: .22
            },
            17467: {
                subtract: 7478.92,
                rate: .24
            },
            30221: {
                subtract: 13164.44,
                rate: .32
            },
            37450: {
                subtract: 15246.06,
                rate: .35
            },
            54463: {
                subtract: 17365.89,
                rate: .37
            }
        }, {
            0: {
                subtract: 3783,
                rate: .1
            },
            5400: {
                subtract: 4052.50,
                rate: .12
            },
            10363: {
                subtract: 6920.91,
                rate: .22
            },
            17817: {
                subtract: 7828.92,
                rate: .24
            },
            30571: {
                subtract: 13514.44,
                rate: .32
            },
            37800: {
                subtract: 15596.06,
                rate: .35
            },
            54813: {
                subtract: 17715.89,
                rate: .37
            }
        }, {
            0: {
                subtract: 4133,
                rate: .1
            },
            5750: {
                subtract: 4402.50,
                rate: .12
            },
            10713: {
                subtract: 7270.91,
                rate: .22
            },
            18167: {
                subtract: 8178.92,
                rate: .24
            },
            30921: {
                subtract: 13864.44,
                rate: .32
            },
            38150: {
                subtract: 15946.06,
                rate: .35
            },
            55163: {
                subtract: 18065.89,
                rate: .37
            }
        }]
    };
