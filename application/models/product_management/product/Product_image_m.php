<?php

class Product_image_m extends MY_Model
{
    protected $_table_name = 'product_images';
    protected $_primary_key = 'id';

    function __construct()
    {
        parent::__construct();
    }

    //.........create admin
    public function add_image($product_code='')
    {

        $path = "uploads/product_image/".$product_code.'/';
        $thumPath = $path.'/thumbnail/';

        if (!is_dir($path)) {
            mkdir($path,0777,TRUE);
        }
        if (!is_dir($thumPath)) {
            mkdir($thumPath,0777,TRUE);
        }

        $config['upload_path']   = $path;
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']      = 1024 * 8;
        $config['encrypt_name']  = true;

        $this->load->library('upload');

        $files = $_FILES;
        $cpt = count($_FILES['files']['name']);
        for($i=0; $i<$cpt; $i++)
        {
            // $config['file_name']     = $product_code.$i;
            $_FILES['files']['name']= $files['files']['name'][$i];
            $_FILES['files']['type']= $files['files']['type'][$i];
            $_FILES['files']['tmp_name']= $files['files']['tmp_name'][$i];
            $_FILES['files']['error']= $files['files']['error'][$i];
            $_FILES['files']['size']= $files['files']['size'][$i];

            $this->upload->initialize($config);
            $this->upload->do_upload('files');
            $tmp = $this->upload->data();

            $this->load->library('image_lib');
            //Thumbnail configs
            $config_t['source_image']   = $path. $tmp['file_name'];
            $config_t['new_image']      = $thumPath. $tmp['file_name'];
            $config_t['maintain_ratio'] = TRUE;
            $config_t['width']   = 700;
            $config_t['height'] = 700;
            //end of configs

            $this->load->library('image_lib', $config_t);
            $this->image_lib->initialize($config_t);
            $thumb = $this->image_lib->resize();
            if(!$thumb)
            echo "Failed." . $this->image_lib->display_errors();


            $uploadData[$i]['image'] = $tmp['file_name'];
            $uploadData[$i]['product_code'] = $product_code;

        }
        if (!empty($uploadData)) {
            if ($this->db->insert_batch($this->_table_name,$uploadData)) {
                return true;
            } else {
                return FALSE;
            }
        }
    }

    public function get_image_by_product_code($product_code='')
    {
        $data = [
            'product_code' => $product_code,
        ];
        $product_image = $this->get_by($data,TRUE);

        if($product_image){
            return $product_image;
        }else {
            return FALSE;
        }
    }
}

?>
