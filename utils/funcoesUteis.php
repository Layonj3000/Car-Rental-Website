<?php

    function formatarData($data)
    {
        return date('d/m/Y',$data);
    }

    function converteDataMySql($data){
        return date('Y-m-d', $data);
    }
    function converteTimestamp($data){
        if (!empty($data)) {
            $timestamp = strtotime($data);
            if ($timestamp !== false) {
                return date('Y-m-d', $timestamp);
            }
        }
        return null;
    }
?>