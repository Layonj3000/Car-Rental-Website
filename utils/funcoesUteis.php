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

function salvarFoto($files) {
    $uploadDir = '../uploads/';

    if (!file_exists($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    if (!isset($files['foto']) || !is_uploaded_file($files['foto']['tmp_name'])) {
        return null;
    }

    error_log("passou do primeiro if: " . print_r($files['foto']['tmp_name'], true), 3, "debug.log");

    $fileName = $files['foto']['name'];
    $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);

    $uniqueFileName = time() . '_' . uniqid() . '.' . $fileExtension;
    $uploadPath = $uploadDir . $uniqueFileName;

    $imageInfo = @getimagesize($files['foto']['tmp_name']);
    if ($imageInfo !== false) {
        if (move_uploaded_file($files['foto']['tmp_name'], $uploadPath)) {
            return $uniqueFileName;
        }
    }
    return null;
}
