<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
*/
$route['default_controller']   = 'HomeController';
$route['404_override']         = '';
$route['translate_uri_dashes'] = FALSE;

/*
| -------------------------------------------------------------------------
| PERSONAL URI ROUTING
| -------------------------------------------------------------------------
*/

//.......ADMIN.............

//.........admin dashboard
$route['admin/dash']                            = 'admin/AdminDashController/index';
//........admin login and logout
$route['admin/login']                           = 'admin/AdminUserController/login';
$route['admin/logout']                          = 'admin/AdminUserController/logout';
//........admin user management
$route['admin/createAdmin']                     = 'admin/AdminUserController/create_admin';
$route['admin/superAdminList']                  = 'admin/AdminUserController/super_admin_list';
$route['admin/adminList']                       = 'admin/AdminUserController/admin_list';
$route['admin/agentList']                       = 'admin/AdminUserController/agent_list';
$route['admin/userAdminActive/(:num)/(:any)']   = 'admin/AdminUserController/user_admin_active/$1/$2';
$route['admin/userAdminDeactive/(:num)/(:any)'] = 'admin/AdminUserController/user_admin_deactive/$1/$2';
$route['admin/userAdminDelete/(:num)/(:any)']   = 'admin/AdminUserController/user_admin_delete/$1/$2';

//..................product
$route['admin/addProduct']                        = 'admin/product/AdminProductController/add_product';

$route['admin/editProductImage/(:num)']           = 'admin/product/AdminProductController/edit_product_image/$1';
$route['admin/deleteProductImage/(:num)']         = 'admin/product/AdminProductController/delete_product_image/$1';

$route['admin/editProductBrand/(:num)']           = 'admin/product/AdminProductController/edit_product_brand/$1';
$route['admin/editProductCategory/(:num)']        = 'admin/product/AdminProductController/edit_product_cat/$1';

$route['admin/editProductColor/(:num)']           = 'admin/product/AdminProductController/edit_product_color/$1';
$route['admin/deleteProductColor/(:num)/(:num)']  = 'admin/product/AdminProductController/delete_product_color/$1/$2';

$route['admin/editProductSize/(:num)']           = 'admin/product/AdminProductController/edit_product_size/$1';
$route['admin/deleteProductSize/(:num)/(:num)']  = 'admin/product/AdminProductController/delete_product_size/$1/$2';

$route['admin/editProductDetails/(:num)']         = 'admin/product/AdminProductController/edit_product_details/$1';
$route['admin/editProductDetails/(:num)/(:num)']  = 'admin/product/AdminProductController/edit_product_details/$1/$2';

$route['admin/deleteProduct/(:num)']              = 'admin/product/AdminProductController/product_delete/$1';
$route['admin/viewProduct/(:num)']                = 'admin/product/AdminProductController/product_view/$1';
$route['admin/productList']                       = 'admin/product/AdminProductController/product_list';


//........Supplier Buyer management by admin
$route['admin/createUser']                      = 'admin/AdminUserController/create_user';
$route['admin/createUser/(:any)']               = 'admin/AdminUserController/create_user/$1';
$route['admin/supplierList']                    = 'admin/AdminUserController/supplier_list';
$route['admin/buyerList']                       = 'admin/AdminUserController/buyer_list';

//............supplier .............
$route['supplier']                                = 'SupplierController/index';
$route['supplier/(:num)']                         = 'SupplierController/index/$1';

$route['supplier/addBank/(:num)']                 = 'SupplierController/add_bank/$1';
$route['supplier/editBank/(:num)/(:num)']         = 'SupplierController/edit_bank/$1/$2';
$route['supplier/deleteBank/(:num)/(:num)']       = 'SupplierController/delete_bank/$1/$2';

$route['supplier/addEwallet/(:num)']              = 'SupplierController/add_ewallet/$1';
$route['supplier/editEwallet/(:num)/(:num)']      = 'SupplierController/edit_ewallet/$1/$2';
$route['supplier/deleteEwallet/(:num)/(:num)']    = 'SupplierController/delete_ewallet/$1/$2';

$route['supplier/addMobileBank/(:num)']           = 'SupplierController/add_mobile_bank/$1';
$route['supplier/editMobileBank/(:num)/(:num)']   = 'SupplierController/edit_mobile_bank/$1/$2';
$route['supplier/deleteMobileBank/(:num)/(:num)'] = 'SupplierController/delete_mobile_bank/$1/$2';

$route['supplier/personalIdentity/(:num)']        = 'SupplierController/edit_personal_identity/$1';
$route['supplier/personalIdentity/(:num)/(:num)'] = 'SupplierController/edit_personal_identity/$1/$2';

$route['supplier/proofOfAddress/(:num)']          = 'SupplierController/edit_proof_of_address/$1';
$route['supplier/proofOfAddress/(:num)/(:num)']   = 'SupplierController/edit_proof_of_address/$1/$2';


//............buyer .............
$route['buyer']                                = 'BuyerController/index';
$route['buyer/(:num)']                         = 'BuyerController/index/$1';

$route['buyer/addBank/(:num)']                 = 'BuyerController/add_bank/$1';
$route['buyer/editBank/(:num)/(:num)']         = 'BuyerController/edit_bank/$1/$2';
$route['buyer/deleteBank/(:num)/(:num)']       = 'BuyerController/delete_bank/$1/$2';

$route['buyer/addEwallet/(:num)']              = 'BuyerController/add_ewallet/$1';
$route['buyer/editEwallet/(:num)/(:num)']      = 'BuyerController/edit_ewallet/$1/$2';
$route['buyer/deleteEwallet/(:num)/(:num)']    = 'BuyerController/delete_ewallet/$1/$2';

$route['buyer/addMobileBank/(:num)']           = 'BuyerController/add_mobile_bank/$1';
$route['buyer/editMobileBank/(:num)/(:num)']   = 'BuyerController/edit_mobile_bank/$1/$2';
$route['buyer/deleteMobileBank/(:num)/(:num)'] = 'BuyerController/delete_mobile_bank/$1/$2';

$route['buyer/personalIdentity/(:num)']        = 'BuyerController/edit_personal_identity/$1';
$route['buyer/personalIdentity/(:num)/(:num)'] = 'BuyerController/edit_personal_identity/$1/$2';

$route['buyer/proofOfAddress/(:num)']          = 'BuyerController/edit_proof_of_address/$1';
$route['buyer/proofOfAddress/(:num)/(:num)']   = 'BuyerController/edit_proof_of_address/$1/$2';




//............ Location...................
//............ Country
$route['admin/country']                     = 'admin/location/AdminCountryController/add_country';
$route['admin/updateCountry/(:num)']        = 'admin/location/AdminCountryController/update_country/$1';
$route['admin/deleteCountry/(:num)']        = 'admin/location/AdminCountryController/delete_country/$1';
//...................division state
$route['admin/divisionState']               = 'admin/location/AdminDivisionStateController/division_state';
$route['admin/updateDivisionState/(:num)']  = 'admin/location/AdminDivisionStateController/update_division_state/$1';
$route['admin/deleteDivisionState/(:num)']  = 'admin/location/AdminDivisionStateController/delete_division_state/$1';
$route['admin/getDivisionStateByJS']        = 'admin/location/AdminDivisionStateController/get_division_state_by_js';
//............. district city
$route['admin/addDistrictCity']             = 'admin/location/AdminDistrictCityController/add_district_city';
$route['admin/districtCityList']            = 'admin/location/AdminDistrictCityController/district_city';
$route['admin/updateDistrictCity/(:num)']   = 'admin/location/AdminDistrictCityController/update_district_city/$1';
$route['admin/deleteDistrictCity/(:num)']   = 'admin/location/AdminDistrictCityController/delete_district_city/$1';
$route['admin/getDistrictCityByJS']         = 'admin/location/AdminDistrictCityController/get_district_city_by_js';
//............. Upazila Police Station
$route['admin/addUpazilaPS']                = 'admin/location/AdminUpazilaPSController/add_upazila_ps';
$route['admin/upazilaPSList']               = 'admin/location/AdminUpazilaPSController/upazila_ps';
$route['admin/updateUpazilaPS/(:num)']      = 'admin/location/AdminUpazilaPSController/update_upazila_ps/$1';
$route['admin/deleteUpazilaPS/(:num)']      = 'admin/location/AdminUpazilaPSController/delete_upazila_ps/$1';
$route['admin/getUpzilaPSByJS']             = 'admin/location/AdminUpazilaPSController/get_upazila_ps_by_js';
//............. Union Word
$route['admin/addUnionWord']                = 'admin/location/AdminUnionWordController/add_union_word';
$route['admin/unionWordList']               = 'admin/location/AdminUnionWordController/union_word';
$route['admin/updateUnionWord/(:num)']      = 'admin/location/AdminUnionWordController/update_union_word/$1';
$route['admin/deleteUnionWord/(:num)']      = 'admin/location/AdminUnionWordController/delete_union_word/$1';
$route['admin/getUnionWordByJS']            = 'admin/location/AdminUnionWordController/get_union_word_by_js';
//............. Village Moholla
$route['admin/addVillageMoholla']           = 'admin/location/AdminVillageMohollaController/add_village_moholla';
$route['admin/villageMohollaList']          = 'admin/location/AdminVillageMohollaController/village_moholla';
$route['admin/updateVillageMoholla/(:num)'] = 'admin/location/AdminVillageMohollaController/update_village_moholla/$1';
$route['admin/deleteVillageMoholla/(:num)'] = 'admin/location/AdminVillageMohollaController/delete_village_moholla/$1';
$route['admin/getVillageMohollaByJS']       = 'admin/location/AdminVillageMohollaController/get_village_moholla_by_js';

//............ Category
$route['admin/category']                 = 'admin/product_management/category/AdminCategoryController/add_category';
$route['admin/updateCategory/(:num)']    = 'admin/product_management/category/AdminCategoryController/update_category/$1';
$route['admin/deleteCategory/(:num)']    = 'admin/product_management/category/AdminCategoryController/delete_category/$1';
//............ Sub Category
$route['admin/subCategory']              = 'admin/product_management/category/AdminSubCategoryController/add_sub_category';
$route['admin/updateSubCategory/(:num)'] = 'admin/product_management/category/AdminSubCategoryController/update_sub_category/$1';
$route['admin/deleteSubCategory/(:num)'] = 'admin/product_management/category/AdminSubCategoryController/delete_sub_category/$1';
$route['admin/getSubCategoryByJS']       = 'admin/product_management/category/AdminSubCategoryController/get_sub_category_by_js';
//............ color
$route['admin/color']              = 'admin/product_management/AdminColorController/color';
$route['admin/updateColor/(:num)'] = 'admin/product_management/AdminColorController/update_color/$1';
$route['admin/deleteColor/(:num)'] = 'admin/product_management/AdminColorController/delete_color/$1';
//............ size
$route['admin/size']               = 'admin/product_management/AdminSizeController/size';
$route['admin/updateSize/(:num)']  = 'admin/product_management/AdminSizeController/update_size/$1';
$route['admin/deleteSize/(:num)']  = 'admin/product_management/AdminSizeController/delete_size/$1';
//............ Brand
$route['admin/brand']              = 'admin/product_management/AdminBrandController/brand';
$route['admin/updateBrand/(:num)'] = 'admin/product_management/AdminBrandController/update_brand/$1';
$route['admin/deleteBrand/(:num)'] = 'admin/product_management/AdminBrandController/delete_brand/$1';
//............ Branch
$route['admin/branch']              = 'admin/product_management/AdminBranchController/branch';
$route['admin/updateBranch/(:num)'] = 'admin/product_management/AdminBranchController/update_branch/$1';
$route['admin/deleteBranch/(:num)'] = 'admin/product_management/AdminBranchController/delete_branch/$1';
//............ E-Wallet
$route['admin/eWallet']              = 'admin/bank_type/AdminEWalletController/ewallet';
$route['admin/updateEWallet/(:num)'] = 'admin/bank_type/AdminEWalletController/update_ewallet/$1';
$route['admin/deleteEWallet/(:num)'] = 'admin/bank_type/AdminEWalletController/delete_ewallet/$1';
//............ Mobile Bank
$route['admin/mobileBank']              = 'admin/bank_type/AdminMobileBankController/mobile_bank';
$route['admin/updateMobileBank/(:num)'] = 'admin/bank_type/AdminMobileBankController/update_mobile_bank/$1';
$route['admin/deleteMobileBank/(:num)'] = 'admin/bank_type/AdminMobileBankController/delete_mobile_bank/$1';

//............ User Category
$route['admin/userCategory']              = 'admin/user_category/AdminUserCategory/user_category';
$route['admin/updateUserCategory/(:num)'] = 'admin/user_category/AdminUserCategory/update_user_category/$1';
$route['admin/deleteUserCategory/(:num)'] = 'admin/user_category/AdminUserCategory/delete_user_category/$1';

//............ User Type
$route['admin/userType']              = 'admin/user_category/AdminUserType/user_type';
$route['admin/updateUserType/(:num)'] = 'admin/user_category/AdminUserType/update_user_type/$1';
$route['admin/deleteUserType/(:num)'] = 'admin/user_category/AdminUserType/delete_user_type/$1';
$route['admin/getUserTypeByJS']       = 'admin/user_category/AdminUserType/get_user_type_by_js';


//............ User Sub Type
$route['admin/userSubType']              = 'admin/user_category/AdminUserSubType/user_sub_type';
$route['admin/updateUserSubType/(:num)'] = 'admin/user_category/AdminUserSubType/update_user_sub_type/$1';
$route['admin/deleteUserSubType/(:num)'] = 'admin/user_category/AdminUserSubType/delete_user_sub_type/$1';
$route['admin/getUserSubTypeByJS']       = 'admin/user_category/AdminUserSubType/get_user_sub_type_by_js';

//............ role
$route['admin/role']                     = 'admin/AdminRoleController/add_role';
$route['admin/updateRole/(:num)']        = 'admin/AdminRoleController/update_role/$1';
$route['admin/deleteRole/(:num)']        = 'admin/AdminRoleController/delete_role/$1';
