<?php

class Product_details_m extends MY_Model
{
    protected $_table_name = 'product_details';
    protected $_primary_key = 'product_code';

    function __construct()
    {
        parent::__construct();
    }

    public function add_details()
    {
        $product_code  = rand(10,99).time().rand(100,999);
        $product_title = $this->input->post('product_title');
        $slug_string   = $product_title." ".$product_code;
        $product_slug  = url_title($slug_string, 'dash', true);

        $this->data = [
            'product_code'    => $product_code,
            'slug'            => $product_slug,
            'product_title'   => $product_title,
            'category_id'     => $this->input->post('category'),
            'sub_category_id' => $this->input->post('sub_category'),
            'brand_id'        => $this->input->post('company'),
            'weight'          => $this->input->post('weight'),
            'price'           => $this->input->post('price'),
        ];

        if ($this->save($this->data)) {
            return $this->data['product_code'];
        }else{
            return false;
        }
    }

    public function get_details()
    {
        $this->db->select('product_details.product_code,product_details.product_title,product_details.price,categorys.category_title,sub_categorys.sub_category_title');
        $this->db->join('categorys', 'categorys.id = product_details.category_id','left');
        $this->db->join('sub_categorys', 'sub_categorys.id=product_details.sub_category_id','left');
        $this->db->order_by("product_details.product_title", "asc");
        $product_details = $this->get();
        if(count($product_details)){
            return $product_details;
        }else {
            return FALSE;
        }
	}

    public function get_products_by_price_range($store_id = '',$minPrice = '', $maxPrice = '', $category_id = '', $sub_category_id = '')
    {
        $this->db->select('stores.store_name,store_products.id,product_details.product_code,product_details.product_title,product_details.price,categorys.category_title,sub_categorys.sub_category_title');
        $this->db->join('categorys', 'categorys.id = product_details.category_id','left');
        $this->db->join('sub_categorys', 'sub_categorys.id=product_details.sub_category_id','left');
        $this->db->join('store_products', 'store_products.product_code = product_details.product_code');
        $this->db->join('stores', 'store_products.store_id = stores.id');
        if ($store_id !== '') {
            $this->db->where('stores.id',$store_id);
        }

        if ($minPrice!="NaN" && $maxPrice!="NaN" && $minPrice!="" && $maxPrice!="") {
            $this->db->where('product_details.price >=', $minPrice);
            $this->db->where('product_details.price <=', $maxPrice);
        }

        if ($category_id!="NaN" && $category_id!="") {
            $this->db->where('product_details.category_id =', $category_id);
        }

        if ($sub_category_id!="NaN" && $sub_category_id!="") {
            $this->db->where('product_details.sub_category_id =', $sub_category_id);
        }


        $this->db->order_by("product_details.price", "asc");
        $product_details = $this->get();
        if(count($product_details)){
            return $product_details;
        }else {
            return FALSE;
        }
	}

    public function get_min_price()
    {
        $this->db->select_min('price','minPrice');
        $min_price = $this->get(NULL,TRUE);
        if(count($min_price)){
            return $min_price;
        }else {
            return FALSE;
        }
    }

    public function get_max_price()
    {
        $this->db->select_max('price','maxPrice');
        $max_price = $this->get(NULL,TRUE);
        if(count($max_price)){
            return $max_price;
        }else {
            return FALSE;
        }
    }

	public function get_store_product($store_id = '')
    {
        $this->db->select('stores.store_name,store_products.id,product_details.product_code,product_details.product_title,product_details.price,categorys.category_title,sub_categorys.sub_category_title');
        $this->db->join('categorys', 'categorys.id = product_details.category_id','left');
        $this->db->join('sub_categorys', 'sub_categorys.id=product_details.sub_category_id','left');
        $this->db->join('store_products', 'store_products.product_code = product_details.product_code');
        $this->db->join('stores', 'store_products.store_id = stores.id');

        if ($store_id !== '') {
            $this->db->where('stores.id',$store_id);
        }

        $this->db->order_by("product_details.product_title", "asc");
        $product_details = $this->get();
        if(count($product_details)){
            return $product_details;
        }else {
            return FALSE;
        }
    }

    public function update_product_band($product_code='')
    {
        $this->data = [
            'brand_id'        => $this->input->post('company'),
        ];

        if ($this->save($this->data,$product_code)) {
            return true;
        }else{
            return false;
        }
    }

    public function update_product_cat($product_code='')
    {
        $this->data = [
            'category_id'     => $this->input->post('category'),
            'sub_category_id' => $this->input->post('sub_category'),
        ];

        if ($this->save($this->data,$product_code)) {
            return true;
        }else{
            return false;
        }
    }

    public function update_product_details($product_code='')
    {
        $product_title = $this->input->post('product_title');
        $slug_string   = $product_title." ".$product_code;
        $product_slug  = url_title($slug_string, 'dash', true);

        $this->data = [
            'slug'            => $product_slug,
            'product_title'   => $product_title,
            'weight'          => $this->input->post('weight'),
            'price'           => $this->input->post('price'),
        ];

        if ($this->save($this->data,$product_code)) {
            return true;
        }else{
            return false;
        }
    }

    public function get_product_brand($product_code='')
    {
        $this->db->select('product_details.product_code,brands.id,brands.brand_name');
        $this->db->join('brands', 'product_details.brand_id = brands.id');
        $product_brand = $this->get_by(['product_code' => $product_code],true);
        if(count($product_brand)){
            return $product_brand;
        }else {
            return FALSE;
        }
    }

    public function get_product_category_sub_category($product_code='')
    {
        $this->db->select('categorys.id,categorys.category_title,sub_categorys.id,sub_categorys.sub_category_title');
        $this->db->join('categorys', 'product_details.category_id = categorys.id');
        $this->db->join('sub_categorys', 'product_details.sub_category_id = sub_categorys.id');
        $product_category_sub_category = $this->get_by(['product_code ' => $product_code],true);
        if(count($product_category_sub_category)){
            return $product_category_sub_category;
        }else {
            return FALSE;
        }
    }


    public function update_details($details_id = null)
    {
        $this->data = [
            'details_name' => $this->input->post('details_name')
        ];

        if ($this->save($this->data,$details_id)) {
            return true;
        }else{
            return false;
        }
    }


}

?>
