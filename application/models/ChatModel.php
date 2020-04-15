<?php

class ChatModel extends GLOBAL_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function initTable()
    {
        return "tbl_chatting";
    }

    public function get_chat()
    {
        return parent::get_object_of_table($this->initTable());
    }

    public function post_chat($data)
    {
        return parent::insert_data($this->initTable(), $data);
    }

    public function getOne($param)
    {
        return parent::get_array_of_row($this->initTable(), $param);
    }

    public function editChat($id, $data)
    {
        return parent::update_table($this->initTable(), "chatting_id", $id, $data);
    }

    public function deleteChat($data)
    {
        return parent::delete_row($this->initTable(), $data);
    }
    public function getChat($kontak)
    {
        $this->db->select('*');
        $this->db->from($this->initTable());
        $this->db->where('chatting_kontak_id', $kontak);
        $this->db->order_by('chatting_id', 'asc');
        $query = $this->db->get();
        return $query;
    }
    public function getLastChat($kontak)
    {
        $this->db->select('*');
        $this->db->from($this->initTable());
        $this->db->where('chatting_kontak_id', $kontak);
        $this->db->limit(2);
        $this->db->order_by('chatting_id','desc');
        $query = $this->db->get();
        return $query;
    }
}