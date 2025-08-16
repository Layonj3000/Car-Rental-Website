<?php

    function formatarData($data){
        $timestamp = strtotime($data);
        return date('d/m/Y', $timestamp);
    }

    function converteDataMySql($data){
        if (!empty($data)) {
            $timestamp = strtotime($data);
            return date('Y-m-d', $timestamp);
        }
        return null;
    }

?>