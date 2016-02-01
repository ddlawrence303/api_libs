<?php

class GlobalLib
{
    private static $_country_datas = array(
        //USA
        'us' => array(
            'code' => 'us',
            'lang' => 'en_US',
            'website_run_code' => 'website_us_en_US',
            'store_run_code' => 'store_us_en_us',
            'online' => false,
            'text' => array('en_short' => 'USA', 'mixed' => 'USA Optoma'),
            'currency' => '$',
            'in_service' => false
        ),
        //Canada
        'ca' => array(
            'code' => 'ca',
            'lang' => 'en_CA',
            'website_run_code' => 'website_ca_en_CA',
            'store_run_code' => 'store_ca_en_CA',
            'online' => false,
            'text' => array('en_short' => 'CA', 'mixed' => 'Canada Optoma'),
            'currency' => '$',
            'in_service' => false
        ),
        //Mexico
        'mx' => array(
            'code' => 'mx',
            'lang' => 'es_MX',
            'website_run_code' => 'website_mx_es_MX',
            'store_run_code' => 'store_mx_es_MX',
            'online' => false,
            'text' => array('en_short' => 'MX', 'mixed' => 'Mexico Optoma'),
            'currency' => 'Mex$', // peso :: Symbol ($) or Mex$
            'in_service' => false,
        ),
        //Brazil
        'br' => array(
            'code' => 'br',
            'lang' => 'pt_BR',
            'website_run_code' => 'website_br_pt_BR',
            'store_run_code' => 'store_br_pt_BR',
            'online' => false,
            'text' => array('en_short' => 'BR', 'mixed' => 'Brazil Optoma'),
            'currency' => 'R$', // real :: Symbol	R$
            'in_service' => false
        ),
    );

    public static function getOnlineCountryDatas()
    {
        $online_country_datas = self::$_country_datas;
        foreach ($online_country_datas as $key => $value) {
            if (!$value['online']) {
                unset($online_country_datas[$key]);
            }
        }
        return $online_country_datas;
    }

    public static function getCountryDataByCode($code)
    {
        return self::$_country_datas[$code] ?: self::$_country_datas['us'];
    }

}
