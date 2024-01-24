<?php

function tampil_username($id)
{
    $ci = &get_instance();
    $ci->load->database();
    $result = $ci->db->where('id', $id)->get('auth');
    foreach ($result->result() as $c) {
        $tmt = $c->username;
        return $tmt;
    }
}

function tampil_image($id)
{
    $ci = &get_instance();
    $ci->load->database();
    $result = $ci->db->where('id', $id)->get('auth');
    foreach ($result->result() as $c) {
        $tmt = $c->image;
        return $tmt;
    }
}

?>