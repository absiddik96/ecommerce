<?php
/**
 *
 */
class SupplierController extends Admin_Controller
{
    function __construct()
    {
        parent::__construct();
    }

    public function index($user_id = null)
    {
        if($user_id == null){
            $user_id = $this->session->userdata('user_id');
        }

        $this->data['addBank']          = "supplier/addBank";
        $this->data['editBank']         = "supplier/editBank";
        $this->data['deleteBank']       = "supplier/deleteBank";

        $this->data['addMobileBank']    = "supplier/addMobileBank";
        $this->data['editMobileBank']   = "supplier/editMobileBank";
        $this->data['deleteMobileBank'] = "supplier/deleteMobileBank";

        $this->data['addEwallet']       = "supplier/addEwallet";
        $this->data['editEwallet']      = "supplier/editEwallet";
        $this->data['deleteEwallet']    = "supplier/deleteEwallet";

        $this->data['user_id']       = $user_id;

        $this->data['user']          = $this->admin_user_m->get_user_admin_info($user_id);
        $this->data['user_details']  = $this->suppliers_n_buyers_details_m->get_suppliers_n_buyers_details($user_id);

        $this->data['bank_infos']    = $this->bank_m->get_bank($user_id);
        $this->data['ewallets']      = $this->ewallet_m->get_ewallet($user_id);
        $this->data['mbanks']        = $this->mobile_bank_m->get_mobile_bank($user_id);

        $this->data['user_location'] = $this->admin_user_location_m->get_admin_user_location($user_id);
        $this->data['content']       = 'supplier_buyer/corporate_view';
        $this->load->view('admin/layouts/_layouts_main',$this->data);
    }

    public function add_bank($user_id = null)
    {
        $this->form_validation->set_rules('bank_name', 'Bank Name', 'trim|required');
        $this->form_validation->set_rules('ac_name', 'Account Name', 'trim|required');
        $this->form_validation->set_rules('ac_number', 'Account Number', 'trim|required');
        $this->form_validation->set_rules('iban_number', 'IBAN / Routing Number', 'trim|required');
        $this->form_validation->set_rules('swift_code', 'Swift Code', 'trim|required');
        $this->form_validation->set_rules('bank_address', 'Bank Address', 'trim|required');

        if($this->form_validation->run()){
            if($this->bank_m->add_bank($user_id)){
                $this->session->set_flashdata('bank_success','Bank Account create successfull.');
            }else{
                $this->session->set_flashdata('bank_faill','Bank Account create fail!!!');
            }
            redirect(base_url('supplier/'.$user_id));
        }

        $this->data['action']    = "supplier/addBank";
        $this->data['user_id']    = $user_id;
        $this->data['content']   = 'bank/add_bank_info';
        $this->load->view('admin/layouts/_layouts_main',$this->data);
    }

    public function edit_bank($user_id = null , $bank_id = null)
    {
        $this->form_validation->set_rules('bank_name', 'Bank Name', 'trim|required');
        $this->form_validation->set_rules('ac_name', 'Account Name', 'trim|required');
        $this->form_validation->set_rules('ac_number', 'Account Number', 'trim|required');
        $this->form_validation->set_rules('iban_number', 'IBAN / Routing Number', 'trim|required');
        $this->form_validation->set_rules('swift_code', 'Swift Code', 'trim|required');
        $this->form_validation->set_rules('bank_address', 'Bank Address', 'trim|required');

        if($this->form_validation->run()){
            if($this->bank_m->edit_bank($bank_id)){
                $this->session->set_flashdata('bank_success','Bank Account Upadate successfull.');
            }else{
                $this->session->set_flashdata('bank_faill','Bank Account Upadate fail!!!');
            }
            redirect(base_url('supplier/'.$user_id));
        }

        $this->data['action']    = "supplier/editBank";
        $this->data['user_id']    = $user_id;
        $this->data['bank_id']    = $bank_id;
        $this->data['bank_info']    = $this->bank_m->get_bank_by_id($bank_id);
        $this->data['content']   = 'bank/edit_bank_info';
        $this->load->view('admin/layouts/_layouts_main',$this->data);
    }

    public function delete_bank($user_id = null , $bank_id = null)
    {
        if ($this->bank_m->delete($bank_id)) {
            $this->session->set_flashdata('bank_success','Delete Bank Account successfull.');
        }else {
            $this->session->set_flashdata('bank_fail','Delete Bank Account Failed.');
        }
        redirect(base_url('supplier/'.$user_id));
    }

    public function add_ewallet($user_id = null)
    {
        $this->form_validation->set_rules('ew_type_id', 'E-Wallet Type', 'trim|required');
        $this->form_validation->set_rules('e_wallet_email', 'E-Wallet Email / Number', 'trim|required');

        if($this->form_validation->run()){
            if($this->ewallet_m->add_ewallet($user_id)){
                $this->session->set_flashdata('ewallet_success','Ewallet Account create successfull.');
            }else{
                $this->session->set_flashdata('ewallet_faill','Ewallet Account create fail!!!');
            }
            redirect(base_url('supplier/'.$user_id));
        }

        $this->data['action']    = "supplier/addEwallet";
        $this->data['ew_types']    = $this->e_wallet_type_m->get();
        $this->data['user_id']    = $user_id;
        $this->data['content']   = 'bank/add_ewallet_info';
        $this->load->view('admin/layouts/_layouts_main',$this->data);
    }

    public function edit_ewallet($user_id = null , $ewallet_id = null)
    {
        $this->form_validation->set_rules('e_wallet_email', 'E-Wallet Email / Number', 'trim|required');

        if($this->form_validation->run()){
            if($this->ewallet_m->edit_ewallet($ewallet_id)){
                $this->session->set_flashdata('ewallet_success','Ewallet Account Upadate successfull.');
            }else{
                $this->session->set_flashdata('ewallet_faill','Ewallet Account Upadate fail!!!');
            }
            redirect(base_url('supplier/'.$user_id));
        }

        $this->data['action']    = "supplier/editEwallet";
        $this->data['user_id']    = $user_id;
        $this->data['ewallet_id']    = $ewallet_id;
        $this->data['ewallet']    = $this->ewallet_m->get_ewallet_by_id($ewallet_id);
        $this->data['content']   = 'bank/edit_ewallet_info';
        $this->load->view('admin/layouts/_layouts_main',$this->data);
    }

    public function delete_ewallet($user_id = null , $ewallet_id = null)
    {
        if ($this->ewallet_m->delete($ewallet_id)) {
            $this->session->set_flashdata('ewallet_success','Delete Ewallet Account successfull.');
        }else {
            $this->session->set_flashdata('ewallet_fail','Delete Ewallet Account Failed.');
        }
        redirect(base_url('supplier/'.$user_id));
    }

    public function add_mobile_bank($user_id = null)
    {
        $this->form_validation->set_rules('country_id', 'Country', 'trim|required');
        $this->form_validation->set_rules('account_id', 'Mobile Bank', 'trim|required');
        $this->form_validation->set_rules('phone_number', 'Account Number', 'trim|required');

        if($this->form_validation->run()){
            if($this->mobile_bank_m->add_mobile_bank($user_id)){
                $this->session->set_flashdata('mobile_bank_success','Mobile Bank Account create successfull.');
            }else{
                $this->session->set_flashdata('mobile_bank_faill','Mobile Bank Account create fail!!!');
            }
            redirect(base_url('supplier/'.$user_id));
        }

        $this->data['action']    = "supplier/addMobileBank";
        $this->data['countries']    = $this->country_m->get();
        $this->data['mb_types']    = $this->mobile_bank_type_m->get();
        $this->data['user_id']    = $user_id;
        $this->data['content']   = 'bank/add_mobile_bank';
        $this->load->view('admin/layouts/_layouts_main',$this->data);
    }

    public function edit_mobile_bank($user_id = null , $mobile_bank_id = null)
    {
        $this->form_validation->set_rules('phone_number', 'Account Number', 'trim|required');

        if($this->form_validation->run()){
            if($this->mobile_bank_m->edit_mobile_bank($mobile_bank_id)){
                $this->session->set_flashdata('mobile_bank_success','Mobile Bank Account Upadate successfull.');
            }else{
                $this->session->set_flashdata('mobile_bank_faill','Mobile Bank Account Upadate fail!!!');
            }
            redirect(base_url('supplier/'.$user_id));
        }

        $this->data['action']    = "supplier/editMobileBank";
        $this->data['user_id']    = $user_id;
        $this->data['mobile_bank_id']    = $mobile_bank_id;
        $this->data['mbanks']    = $this->mobile_bank_m->get($mobile_bank_id);
        $this->data['content']   = 'bank/edit_mobile_bank';
        $this->load->view('admin/layouts/_layouts_main',$this->data);
    }

    public function delete_mobile_bank($user_id = null , $mobile_bank_id = null)
    {
        if ($this->mobile_bank_m->delete($mobile_bank_id)) {
            $this->session->set_flashdata('mobile_bank_success','Delete Mobile Bank Account successfull.');
        }else {
            $this->session->set_flashdata('mobile_bank_fail','Delete Mobile Bank Account Failed.');
        }
        redirect(base_url('supplier/'.$user_id));
    }


}

?>
