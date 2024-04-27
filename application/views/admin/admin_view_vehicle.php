<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php echo site_title(); ?> | Admin | Vehicle</title>
<?php echo $link_script; ?>
</head>
<body>
<?php echo $header; ?>
<?php echo $left_nav; ?>
<?php echo $right_nav; ?>
<section class="main_board">
    <div class="container-fluid">
        <div class="row">
            <div class="board fixed_box display_none open_vehicle_form">
                <form id="add_vehicle_form" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="<?php echo $csrfName; ?>" value="<?php echo $csrfHash; ?>">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="bg-white p-3">
                            <h5 class="heading">Add Vehicle <span style="float:right; padding: 5px; cursor: pointer; font-size:35px; color:red;" onclick="close_vehicle_form()">&times;</span></h5>
                            <small>Dashboard > Add Vehicle</small>
                        </div>

                        <div class="bg-white p-3">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="w-100 mb-3">
                                        <label>Vehicle Type</label><br>
                                        <select name="type" class="form-control">
                                            <option value="">select</option>
                                            <option value="Hatchback">Hatchback</option>
                                            <option value="Sedan">Sedan</option>
                                            <option value="SUV">SUV</option>
                                            <option value="MUV">MUV</option>
                                            <option value="Coupe">Coupe</option>
                                            <option value="Convertible">Convertible</option>
                                            <option value="Pickup Truck">Pickup Truck</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="w-100 mb-3">
                                        <label>Vehicle Name</label><br>
                                        <input type="text" name="name" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="w-100 mb-3">
                                        <label>Vehicle Brand</label><br>
                                        <input type="text" name="brand" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="w-100 mb-3">
                                        <label>Seater</label><br>
                                        <input type="number" name="seater" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="w-100 mb-3">
                                        <label>Fuel Type</label><br>
                                        <input type="text" name="fuel_type" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="w-100 mb-3">
                                        <label>AC / NON-AC</label><br>
                                        <select name="ac_nonac" class="form-control">
                                            <option disabled selected value=""></option>
                                            <option value="AC">AC</option>
                                            <option value="Non-AC">Non-AC</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="w-100 mb-3">
                                        <label>Description</label><br>
                                        <textarea name="description" class="form-control"></textarea>
                                    </div>
                                </div>
                                
                                <div class="col-lg-12">
                                    <div class="w-100 mb-3">
                                        <label class="mb-2">Services</label><br>
                                        <div class="loopPriceSetup serv_label card p-3 mb-2">
                                            <label class="cp ope_price">
                                                Outstation (One Way)
                                                <input type="hidden" value="outstation_oneway" name="service_type[]">
                                                <input type="hidden" name="min_hr[]">
                                                <input type="hidden" name="min_km[]">
                                                <input type="hidden" name="package_type[]">
                                                <!-- <input type="checkbox" value="outstation_oneway" style="position: relative; top: 1px;"> Outstation (One Way) -->
                                            </label>
                                            <div class="row service_prices mt-2">
                                                <div class="col-lg-3">
                                                    <div class="w-100 mb-2">
                                                        <label>Fare/Km</label><br>
                                                        <input type="number" step="any" name="fare[]" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="w-100 mb-2">
                                                        <label>Extra Kms (Rs/Km)</label><br>
                                                        <input type="number" step="any" name="extra_km[]" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-lg-3" style="display:none;">
                                                    <div class="w-100 mb-2">
                                                        <label>Extra Hrs (Rs/Hr)</label><br>
                                                        <input type="number" step="any" name="extra_hr[]" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="loopPriceSetup serv_label card p-3 mb-2">
                                            <label class="cp ope_price">
                                                Outstation (Round Trip)
                                                <input type="hidden" value="outstation_roundtrip" name="service_type[]">
                                                <input type="hidden" name="min_hr[]">
                                                <input type="hidden" name="package_type[]">
                                                <!-- <input type="checkbox" value="outstation_roundtrip" style="position: relative; top: 1px;"> Outstation (Round Trip) -->
                                            </label>
                                            <div class="row service_prices mt-2">
                                                <div class="col-lg-3">
                                                    <div class="w-100 mb-2">
                                                        <label>Minimum Km</label><br>
                                                        <input type="number" step="any" name="min_km[]" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="w-100 mb-2">
                                                        <label>Fare/Km</label><br>
                                                        <input type="number" step="any" name="fare[]" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="w-100 mb-2">
                                                        <label>Extra Kms (Rs/Km)</label><br>
                                                        <input type="number" step="any" name="extra_km[]" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-lg-3" style="display:none;">
                                                    <div class="w-100 mb-2">
                                                        <label>Extra Hrs (Rs/Hr)</label><br>
                                                        <input type="number" step="any" name="extra_hr[]" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="loopPriceSetup serv_label card p-3 mb-2">
                                            <label class="cp ope_price">
                                                Airport Transfers
                                                <input type="hidden" value="airport_transfer" name="service_type[]">
                                                <input type="hidden" name="min_hr[]">
                                                <input type="hidden" name="min_km[]">
                                                <input type="hidden" name="package_type[]">
                                                <!-- <input type="checkbox" value="airport_transfer" style="position: relative; top: 1px;"> Airport Transfers -->
                                            </label>
                                            <div class="row service_prices mt-2">
                                                <div class="col-lg-3">
                                                    <div class="w-100 mb-2">
                                                        <label>Fare/Km</label><br>
                                                        <input type="number" step="any" name="fare[]" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="w-100 mb-2">
                                                        <label>Extra Kms (Rs/Km)</label><br>
                                                        <input type="number" step="any" name="extra_km[]" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-lg-3" style="display:none;">
                                                    <div class="w-100 mb-2">
                                                        <label>Extra Hrs (Rs/Hr)</label><br>
                                                        <input type="number" step="any" name="extra_hr[]" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="loopPriceSetup serv_label card p-3 mb-2">
                                            <label class="cp ope_price">
                                                City Pickup & Drop
                                                <input type="hidden" value="city_pickupdrop" name="service_type[]">
                                                <input type="hidden" name="min_hr[]">
                                                <input type="hidden" name="package_type[]">
                                                <!-- <input type="checkbox" value="city_pickupdrop" style="position: relative; top: 1px;"> City Pickup & Drop -->
                                            </label>
                                            <div class="row service_prices mt-2">
                                                <div class="col-lg-3">
                                                    <div class="w-100 mb-2">
                                                        <label>Minimum Km</label><br>
                                                        <input type="number" step="any" name="min_km[]" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="w-100 mb-2">
                                                        <label>Minimum Fare</label><br>
                                                        <input type="number" step="any" name="fare[]" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="w-100 mb-2">
                                                        <label>Extra Kms (Rs/Km)</label><br>
                                                        <input type="number" step="any" name="extra_km[]" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-lg-3" style="display:none;">
                                                    <div class="w-100 mb-2">
                                                        <label>Extra Hrs (Rs/Hr)</label><br>
                                                        <input type="number" step="any" name="extra_hr[]" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="serv_label card p-3 mb-2">
                                            <label class="cp ope_price">
                                                Hourly Rental
                                            </label>
                                            <div class="loopPriceSetup row service_prices mt-2">
                                                <div class="col-12 card py-2">
                                                    <h6>
                                                        Package 1
                                                        <input type="hidden" value="hourly_rental" name="service_type[]">
                                                        <input type="hidden" name="package_type[]" value="hourly_rental_package_1">
                                                    </h6>
                                                    <div class="row">
                                                        <div class="col-lg-2">
                                                            <div class="w-100 mb-2">
                                                                <label>Hrs</label><br>
                                                                <input type="number" step="any" name="min_hr[]" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-2">
                                                            <div class="w-100 mb-2">
                                                                <label>Kms</label><br>
                                                                <input type="number" step="any" name="min_km[]" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-2">
                                                            <div class="w-100 mb-2">
                                                                <label>Fare</label><br>
                                                                <input type="number" step="any" name="fare[]" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-2">
                                                            <div class="w-100 mb-2">
                                                                <label>Extra Kms (Rs/Km)</label><br>
                                                                <input type="number" step="any" name="extra_km[]" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-2">
                                                            <div class="w-100 mb-2">
                                                                <label>Extra Hrs (Rs/Hr)</label><br>
                                                                <input type="number" step="any" name="extra_hr[]" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="loopPriceSetup row service_prices mt-2">
                                                <div class="col-12 card py-2">
                                                    <h6>Package 2
                                                        <input type="hidden" value="hourly_rental" name="service_type[]">
                                                        <input type="hidden" name="package_type[]" value="hourly_rental_package_2">
                                                    </h6>
                                                    <div class="row">
                                                        <div class="col-lg-2">
                                                            <div class="w-100 mb-2">
                                                                <label>Hrs</label><br>
                                                                <input type="number" step="any" name="min_hr[]" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-2">
                                                            <div class="w-100 mb-2">
                                                                <label>Kms</label><br>
                                                                <input type="number" step="any" name="min_km[]" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-2">
                                                            <div class="w-100 mb-2">
                                                                <label>Fare</label><br>
                                                                <input type="number" step="any" name="fare[]" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-2">
                                                            <div class="w-100 mb-2">
                                                                <label>Extra Kms (Rs/Km)</label><br>
                                                                <input type="number" step="any" name="extra_km[]" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-2">
                                                            <div class="w-100 mb-2">
                                                                <label>Extra Hrs (Rs/Hr)</label><br>
                                                                <input type="number" step="any" name="extra_hr[]" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="loopPriceSetup row service_prices mt-2">
                                                <div class="col-12 card py-2">
                                                    <h6>Package 3
                                                        <input type="hidden" value="hourly_rental" name="service_type[]">
                                                        <input type="hidden" name="package_type[]" value="hourly_rental_package_3">
                                                    </h6>
                                                    <div class="row">
                                                        <div class="col-lg-2">
                                                            <div class="w-100 mb-2">
                                                                <label>Hrs</label><br>
                                                                <input type="number" step="any" name="min_hr[]" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-2">
                                                            <div class="w-100 mb-2">
                                                                <label>Kms</label><br>
                                                                <input type="number" step="any" name="min_km[]" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-2">
                                                            <div class="w-100 mb-2">
                                                                <label>Fare</label><br>
                                                                <input type="number" step="any" name="fare[]" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-2">
                                                            <div class="w-100 mb-2">
                                                                <label>Extra Kms (Rs/Km)</label><br>
                                                                <input type="number" step="any" name="extra_km[]" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-2">
                                                            <div class="w-100 mb-2">
                                                                <label>Extra Hrs (Rs/Hr)</label><br>
                                                                <input type="number" step="any" name="extra_hr[]" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="loopPriceSetup row service_prices mt-2">
                                                <div class="col-12 card py-2">
                                                    <h6>Package 4
                                                        <input type="hidden" value="hourly_rental" name="service_type[]">
                                                        <input type="hidden" name="package_type[]" value="hourly_rental_package_4">
                                                    </h6>
                                                    <div class="row">
                                                        <div class="col-lg-2">
                                                            <div class="w-100 mb-2">
                                                                <label>Hrs</label><br>
                                                                <input type="number" step="any" name="min_hr[]" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-2">
                                                            <div class="w-100 mb-2">
                                                                <label>Kms</label><br>
                                                                <input type="number" step="any" name="min_km[]" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-2">
                                                            <div class="w-100 mb-2">
                                                                <label>Fare</label><br>
                                                                <input type="number" step="any" name="fare[]" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-2">
                                                            <div class="w-100 mb-2">
                                                                <label>Extra Kms (Rs/Km)</label><br>
                                                                <input type="number" step="any" name="extra_km[]" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-2">
                                                            <div class="w-100 mb-2">
                                                                <label>Extra Hrs (Rs/Hr)</label><br>
                                                                <input type="number" step="any" name="extra_hr[]" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                                
                                <div class="col-lg-12 mb-4">
                                    <label class="mb-3">Upload Images</label><br>
                                    <div class="all_car_pics">
                                        
                                        <div class="car_pic">
                                            <div class="car_img"><img src=""></div>
                                            <div class="car_action">
                                                <input type="file" name="main_img">
                                                <i class="fas fa-camera-retro upimg"></i>
                                                <button type="button" class="delimg"><i class="fas fa-trash-alt"></i></button>
                                            </div>
                                        </div>
                                        
                                        <div class="car_pic">
                                            <div class="car_img"><img src=""></div>
                                            <div class="car_action">
                                                <input type="file" name="1_img">
                                                <i class="fas fa-camera-retro upimg"></i>
                                                <button type="button" class="delimg"><i class="fas fa-trash-alt"></i></button>
                                            </div>
                                        </div>
                                        
                                        <div class="car_pic">
                                            <div class="car_img"><img src=""></div>
                                            <div class="car_action">
                                                <input type="file" name="2_img">
                                                <i class="fas fa-camera-retro upimg"></i>
                                                <button type="button" class="delimg"><i class="fas fa-trash-alt"></i></button>
                                            </div>
                                        </div>
                                        
                                        <div class="car_pic">
                                            <div class="car_img"><img src=""></div>
                                            <div class="car_action">
                                                <input type="file" name="3_img">
                                                <i class="fas fa-camera-retro upimg"></i>
                                                <button type="button" class="delimg"><i class="fas fa-trash-alt"></i></button>
                                            </div>
                                        </div>
                                        
                                        <div class="car_pic">
                                            <div class="car_img"><img src=""></div>
                                            <div class="car_action">
                                                <input type="file" name="4_img">
                                                <i class="fas fa-camera-retro upimg"></i>
                                                <button type="button" class="delimg"><i class="fas fa-trash-alt"></i></button>
                                            </div>
                                        </div>
                                        <div class="car_pic">
                                            <div class="car_img"><img src=""></div>
                                            <div class="car_action">
                                                <input type="file" name="5_img">
                                                <i class="fas fa-camera-retro upimg"></i>
                                                <button type="button" class="delimg"><i class="fas fa-trash-alt"></i></button>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>

                                <div class="col-lg-12 text-end">
                                    <button type="button" onclick="close_vehicle_form()" class="_wtBtnMd bg_gray">Cancel</button>
                                    <button type="submit" class="_wtBtnMd bg_theme_2">Add Vehicle</button>
                                </div>
                            </div>
                        </div>

                    </div>
                </form>
            </div>

            <div class="board fixed_box display_none open_up_vehicle_form">
                <form id="up_vehicle_form" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="<?php echo $csrfName; ?>" value="<?php echo $csrfHash; ?>">
                    <input type="hidden" name="id">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="bg-white p-3">
                            <h5 class="heading">Edit & Update Vehicle <span style="float:right; padding: 5px; cursor: pointer; font-size:35px; color:red;" onclick="close_up_vehicle_form()">&times;</span></h5>
                            <small>Dashboard > Edit & Update Vehicle</small>
                        </div>

                        <div class="bg-white p-3">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="w-100 mb-3">
                                        <label>Vehicle Type</label><br>
                                        <select name="type" class="form-control">
                                            <option value="">select</option>
                                            <option value="Hatchback">Hatchback</option>
                                            <option value="Sedan">Sedan</option>
                                            <option value="SUV">SUV</option>
                                            <option value="MUV">MUV</option>
                                            <option value="Coupe">Coupe</option>
                                            <option value="Convertible">Convertible</option>
                                            <option value="Pickup Truck">Pickup Truck</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="w-100 mb-3">
                                        <label>Vehicle Name</label><br>
                                        <input type="text" name="name" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="w-100 mb-3">
                                        <label>Vehicle Brand</label><br>
                                        <input type="text" name="brand" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="w-100 mb-3">
                                        <label>Seater</label><br>
                                        <input type="number" name="seater" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="w-100 mb-3">
                                        <label>Fuel Type</label><br>
                                        <input type="text" name="fuel_type" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="w-100 mb-3">
                                        <label>AC / NON-AC</label><br>
                                        <select name="ac_nonac" class="form-control">
                                            <option disabled selected value=""></option>
                                            <option value="AC">AC</option>
                                            <option value="Non-AC">Non-AC</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="w-100 mb-3">
                                        <label>Description</label><br>
                                        <textarea name="description" class="form-control"></textarea>
                                    </div>
                                </div>
                                
                                <div class="col-lg-12">
                                    <div class="w-100 mb-3">
                                        <label class="mb-2">Services</label><br>
                                        <div class="loopPriceSetup serv_label card p-3 mb-2">
                                            <label class="cp ope_price">
                                                Outstation (One Way)
                                                <input type="hidden" value="outstation_oneway" name="service_type[]">
                                                <input type="hidden" name="min_hr[]">
                                                <input type="hidden" name="min_km[]">
                                                <input type="hidden" name="package_type[]">
                                                <!-- <input type="checkbox" value="outstation_oneway" style="position: relative; top: 1px;"> Outstation (One Way) -->
                                            </label>
                                            <div class="row service_prices mt-2">
                                                <div class="col-lg-3">
                                                    <div class="w-100 mb-2">
                                                        <label>Fare/Km</label><br>
                                                        <input type="number" step="any" name="fare[]" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="w-100 mb-2">
                                                        <label>Extra Kms (Rs/Km)</label><br>
                                                        <input type="number" step="any" name="extra_km[]" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-lg-3" style="display:none;">
                                                    <div class="w-100 mb-2">
                                                        <label>Extra Hrs (Rs/Hr)</label><br>
                                                        <input type="number" step="any" name="extra_hr[]" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="loopPriceSetup serv_label card p-3 mb-2">
                                            <label class="cp ope_price">
                                                Outstation (Round Trip)
                                                <input type="hidden" value="outstation_roundtrip" name="service_type[]">
                                                <input type="hidden" name="min_hr[]">
                                                <input type="hidden" name="package_type[]">
                                                <!-- <input type="checkbox" value="outstation_roundtrip" style="position: relative; top: 1px;"> Outstation (Round Trip) -->
                                            </label>
                                            <div class="row service_prices mt-2">
                                                <div class="col-lg-3">
                                                    <div class="w-100 mb-2">
                                                        <label>Minimum Km</label><br>
                                                        <input type="number" step="any" name="min_km[]" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="w-100 mb-2">
                                                        <label>Fare/Km</label><br>
                                                        <input type="number" step="any" name="fare[]" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="w-100 mb-2">
                                                        <label>Extra Kms (Rs/Km)</label><br>
                                                        <input type="number" step="any" name="extra_km[]" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-lg-3" style="display:none;">
                                                    <div class="w-100 mb-2">
                                                        <label>Extra Hrs (Rs/Hr)</label><br>
                                                        <input type="number" step="any" name="extra_hr[]" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="loopPriceSetup serv_label card p-3 mb-2">
                                            <label class="cp ope_price">
                                                Airport Transfers
                                                <input type="hidden" value="airport_transfer" name="service_type[]">
                                                <input type="hidden" name="min_hr[]">
                                                <input type="hidden" name="min_km[]">
                                                <input type="hidden" name="package_type[]">
                                                <!-- <input type="checkbox" value="airport_transfer" style="position: relative; top: 1px;"> Airport Transfers -->
                                            </label>
                                            <div class="row service_prices mt-2">
                                                <div class="col-lg-3">
                                                    <div class="w-100 mb-2">
                                                        <label>Fare/Km</label><br>
                                                        <input type="number" step="any" name="fare[]" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="w-100 mb-2">
                                                        <label>Extra Kms (Rs/Km)</label><br>
                                                        <input type="number" step="any" name="extra_km[]" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-lg-3" style="display:none;">
                                                    <div class="w-100 mb-2">
                                                        <label>Extra Hrs (Rs/Hr)</label><br>
                                                        <input type="number" step="any" name="extra_hr[]" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="loopPriceSetup serv_label card p-3 mb-2">
                                            <label class="cp ope_price">
                                                City Pickup & Drop
                                                <input type="hidden" value="city_pickupdrop" name="service_type[]">
                                                <input type="hidden" name="min_hr[]">
                                                <input type="hidden" name="package_type[]">
                                                <!-- <input type="checkbox" value="city_pickupdrop" style="position: relative; top: 1px;"> City Pickup & Drop -->
                                            </label>
                                            <div class="row service_prices mt-2">
                                                <div class="col-lg-3">
                                                    <div class="w-100 mb-2">
                                                        <label>Minimum Km</label><br>
                                                        <input type="number" step="any" name="min_km[]" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="w-100 mb-2">
                                                        <label>Minimum Fare</label><br>
                                                        <input type="number" step="any" name="fare[]" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="w-100 mb-2">
                                                        <label>Extra Kms (Rs/Km)</label><br>
                                                        <input type="number" step="any" name="extra_km[]" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-lg-3" style="display:none;">
                                                    <div class="w-100 mb-2">
                                                        <label>Extra Hrs (Rs/Hr)</label><br>
                                                        <input type="number" step="any" name="extra_hr[]" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="serv_label card p-3 mb-2">
                                            <label class="cp ope_price">
                                                Hourly Rental
                                            </label>
                                            <div class="loopPriceSetup row service_prices mt-2">
                                                <div class="col-12 card py-2">
                                                    <h6>Package 1
                                                        <input type="hidden" value="hourly_rental" name="service_type[]">
                                                        <input type="hidden" name="package_type[]" value="hourly_rental_package_1">
                                                    </h6>
                                                    <div class="row">
                                                        <div class="col-lg-2">
                                                            <div class="w-100 mb-2">
                                                                <label>Hrs</label><br>
                                                                <input type="number" step="any" name="min_hr[]" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-2">
                                                            <div class="w-100 mb-2">
                                                                <label>Kms</label><br>
                                                                <input type="number" step="any" name="min_km[]" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-2">
                                                            <div class="w-100 mb-2">
                                                                <label>Fare</label><br>
                                                                <input type="number" step="any" name="fare[]" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-2">
                                                            <div class="w-100 mb-2">
                                                                <label>Extra Kms (Rs/Km)</label><br>
                                                                <input type="number" step="any" name="extra_km[]" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-2">
                                                            <div class="w-100 mb-2">
                                                                <label>Extra Hrs (Rs/Hr)</label><br>
                                                                <input type="number" step="any" name="extra_hr[]" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="loopPriceSetup row service_prices mt-2">
                                                <div class="col-12 card py-2">
                                                    <h6>Package 2
                                                        <input type="hidden" value="hourly_rental" name="service_type[]">
                                                        <input type="hidden" name="package_type[]" value="hourly_rental_package_2">
                                                    </h6>
                                                    <div class="row">
                                                        <div class="col-lg-2">
                                                            <div class="w-100 mb-2">
                                                                <label>Hrs</label><br>
                                                                <input type="number" step="any" name="min_hr[]" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-2">
                                                            <div class="w-100 mb-2">
                                                                <label>Kms</label><br>
                                                                <input type="number" step="any" name="min_km[]" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-2">
                                                            <div class="w-100 mb-2">
                                                                <label>Fare</label><br>
                                                                <input type="number" step="any" name="fare[]" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-2">
                                                            <div class="w-100 mb-2">
                                                                <label>Extra Kms (Rs/Km)</label><br>
                                                                <input type="number" step="any" name="extra_km[]" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-2">
                                                            <div class="w-100 mb-2">
                                                                <label>Extra Hrs (Rs/Hr)</label><br>
                                                                <input type="number" step="any" name="extra_hr[]" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="loopPriceSetup row service_prices mt-2">
                                                <div class="col-12 card py-2">
                                                    <h6>Package 3
                                                        <input type="hidden" value="hourly_rental" name="service_type[]">
                                                        <input type="hidden" name="package_type[]" value="hourly_rental_package_3">
                                                    </h6>
                                                    <div class="row">
                                                        <div class="col-lg-2">
                                                            <div class="w-100 mb-2">
                                                                <label>Hrs</label><br>
                                                                <input type="number" step="any" name="min_hr[]" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-2">
                                                            <div class="w-100 mb-2">
                                                                <label>Kms</label><br>
                                                                <input type="number" step="any" name="min_km[]" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-2">
                                                            <div class="w-100 mb-2">
                                                                <label>Fare</label><br>
                                                                <input type="number" step="any" name="fare[]" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-2">
                                                            <div class="w-100 mb-2">
                                                                <label>Extra Kms (Rs/Km)</label><br>
                                                                <input type="number" step="any" name="extra_km[]" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-2">
                                                            <div class="w-100 mb-2">
                                                                <label>Extra Hrs (Rs/Hr)</label><br>
                                                                <input type="number" step="any" name="extra_hr[]" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="loopPriceSetup row service_prices mt-2">
                                                <div class="col-12 card py-2">
                                                    <h6>Package 4
                                                        <input type="hidden" value="hourly_rental" name="service_type[]">
                                                        <input type="hidden" name="package_type[]" value="hourly_rental_package_4">
                                                    </h6>
                                                    <div class="row">
                                                        <div class="col-lg-2">
                                                            <div class="w-100 mb-2">
                                                                <label>Hrs</label><br>
                                                                <input type="number" step="any" name="min_hr[]" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-2">
                                                            <div class="w-100 mb-2">
                                                                <label>Kms</label><br>
                                                                <input type="number" step="any" name="min_km[]" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-2">
                                                            <div class="w-100 mb-2">
                                                                <label>Fare</label><br>
                                                                <input type="number" step="any" name="fare[]" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-2">
                                                            <div class="w-100 mb-2">
                                                                <label>Extra Kms (Rs/Km)</label><br>
                                                                <input type="number" step="any" name="extra_km[]" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-2">
                                                            <div class="w-100 mb-2">
                                                                <label>Extra Hrs (Rs/Hr)</label><br>
                                                                <input type="number" step="any" name="extra_hr[]" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                                
                                <div class="col-lg-12 mb-4">
                                    <label class="mb-3">Upload Images</label><br>
                                    <div class="all_car_pics">
                                        
                                        <div class="car_pic">
                                            <div class="car_img"><img src=""></div>
                                            <div class="car_action">
                                                <input type="file" name="main_img" class="w-100">
                                                <i class="fas fa-camera-retro upimg w-100"></i>
                                            </div>
                                        </div>
                                        
                                        <div class="car_pic">
                                            <div class="car_img"><img src=""></div>
                                            <div class="car_action">
                                                <input type="file" name="1_img">
                                                <i class="fas fa-camera-retro upimg"></i>
                                                <button type="button" class="delimg"><i class="fas fa-trash-alt"></i></button>
                                            </div>
                                        </div>
                                        
                                        <div class="car_pic">
                                            <div class="car_img"><img src=""></div>
                                            <div class="car_action">
                                                <input type="file" name="2_img">
                                                <i class="fas fa-camera-retro upimg"></i>
                                                <button type="button" class="delimg"><i class="fas fa-trash-alt"></i></button>
                                            </div>
                                        </div>
                                        
                                        <div class="car_pic">
                                            <div class="car_img"><img src=""></div>
                                            <div class="car_action">
                                                <input type="file" name="3_img">
                                                <i class="fas fa-camera-retro upimg"></i>
                                                <button type="button" class="delimg"><i class="fas fa-trash-alt"></i></button>
                                            </div>
                                        </div>
                                        
                                        <div class="car_pic">
                                            <div class="car_img"><img src=""></div>
                                            <div class="car_action">
                                                <input type="file" name="4_img">
                                                <i class="fas fa-camera-retro upimg"></i>
                                                <button type="button" class="delimg"><i class="fas fa-trash-alt"></i></button>
                                            </div>
                                        </div>
                                        <div class="car_pic">
                                            <div class="car_img"><img src=""></div>
                                            <div class="car_action">
                                                <input type="file" name="5_img">
                                                <i class="fas fa-camera-retro upimg"></i>
                                                <button type="button" class="delimg"><i class="fas fa-trash-alt"></i></button>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>

                                <div class="col-lg-12 text-end">
                                    <button type="button" onclick="close_up_vehicle_form()" class="_wtBtnMd bg_gray">Cancel</button>
                                    <button type="submit" class="_wtBtnMd bg_theme_2">Update Vehicle</button>
                                </div>
                            </div>
                        </div>

                    </div>
                </form>
            </div>

            <div class="board">
                <div class="col-lg-12">
                    <div class="bg-white p-3 my-2">
                        <button type="button" class="_wtBtnMd bg_theme_1" onclick="open_vehicle_form()">Add Vehicle</button>
                    </div>
                    <div class="table-responsive bg-white p-3">
                        <table class="table table-sm history-wrapper w-100" id="vehicle_datatable">
                            <thead>
                                <tr>
                                    <th>Media</th>
                                    <th>Type</th>
                                    <th>Name</th>
                                    <th>Brand</th>
                                    <th>Seater</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>


<script type="text/javascript">
var base_url="<?php echo base_url(); ?>";
var csrfName="<?php echo $csrfName; ?>";
var csrfHash="<?php echo $csrfHash; ?>";

$(document).ready(function(e) {
    //datatable loading
    $('#vehicle_datatable').DataTable({
        "processing" : true,
        "serverSide" : true,
        "language": {
            "lengthMenu": '_MENU_',
            "sSearch": "",
            "searchPlaceholder": "Search records"
        },
        "ajax":{
            data:{[csrfName]:csrfHash},
            url:"<?php echo base_url('admin/Admin_view_vehicle/fetch_all_vehicle'); ?>",  
            type:"POST"
        },  
        "columnDefs":[
            {  
                "orderable":false, "targets":[6],  
            },  
        ],  
        "order":[[0,"desc"]]
    });
});
function reload_data_table(element){
    $(element).DataTable().ajax.reload();
}
function open_vehicle_form(){
    $(".open_vehicle_form").fadeIn();
}
function close_vehicle_form(){
    $('.fixed_box').animate({scrollTop:0},300);
    $("#add_vehicle_form").find("select[name='type'], input[type='text'],input[type='file'],input[type='number'],textarea").val("");  
    $("#add_vehicle_form").find(".showImg").attr("src", "");  
    $("#add_vehicle_form").find("._showVdo").attr("src", "");  
    $("#up_vehicle_form input[type='checkbox']").prop("checked", false);
    $(".open_vehicle_form").fadeOut();
}
function open_up_vehicle_form(){
    $(".open_up_vehicle_form").fadeIn();
}
function close_up_vehicle_form(){
    $('.fixed_box').animate({scrollTop:0},300);
    $("#up_vehicle_form").find("select[name='type'], input[type='text'],input[type='file'],input[type='number'],textarea").val(""); 
    $("#up_vehicle_form").find(".showImg").attr("src", "");   
    $("#up_vehicle_form").find("._showVdo").attr("src", "");   
    $("#up_vehicle_form input[type='checkbox']").prop("checked", false);
    $(".open_up_vehicle_form").fadeOut();
}
$(document).on('submit', '#add_vehicle_form', function(event){ 
    event.preventDefault();  
    $.ajax({  
        url:"<?php echo base_url('admin/Admin_view_vehicle/add_vehicle'); ?>", 
        method:'POST',  
        data:new FormData(this),
        dataType: 'JSON',
        contentType:false,  
        processData:false,  
        success:function(data){
            webinaToast({type: data.type, message: data.text});
            if(data.type=='success'){
                close_vehicle_form();
                reload_data_table("#vehicle_datatable");
            }
        }
    });
});
$(document).on('submit', '#up_vehicle_form', function(event){ 
    event.preventDefault();  
    $.ajax({  
        url:"<?php echo base_url('admin/Admin_view_vehicle/update_vehicle'); ?>", 
        method:'POST',  
        data:new FormData(this),
        dataType: 'JSON',
        contentType:false,  
        processData:false,  
        success:function(data){
            webinaToast({type: data.type, message: data.text});
            if(data.type=='success'){
                close_up_vehicle_form();
                reload_data_table("#vehicle_datatable");
            }
        }
    });   
});
function vehicle_status_data(id){
    if($("#"+id+"_status").is(":checked")){
        var status=1;
    }else{
        var status=0;
    }
    $.ajax({  
        url:base_url+"/admin/Admin_view_vehicle/vehicle_status_data", 
        method:'POST',  
        data:{[csrfName]:csrfHash, id:id, status:status},
        dataType: 'JSON',
        success:function(data){
            webinaToast({type: data.type, message: data.text});
            if(data.type!='success'){
                reload_data_table("#vehicle_datatable");
            }
        }
    });
}
function update_all_details(id){
    open_up_vehicle_form();
    $.ajax({
        url:"<?php echo base_url('admin/Admin_view_vehicle/update_vehicle_fetch'); ?>",
        method:"POST",
        data:{[csrfName]:csrfHash, id:id},
        dataType: "JSON",
        success:function(data){
            var data1=data.data1;
            var data2=data.data2;
            // console.log(data1);
            // console.log(data2);
            $.each(data1, function(i, row){
                if(i=="main_img" && row!=""){
                    $("#up_vehicle_form [name='main_img']").closest(".car_pic").find("img").attr("src", "<?php echo base_url('uploads/vehicle/'); ?>"+row);
                }else{
                    if(i=="other_img" && row!=""){
                        var other_img=row.split("|");
                        for (var i = 0; i<other_img.length; i++) {
                            $("#up_vehicle_form [name='"+(i+1)+"_img']").closest(".car_pic").find("img").attr("src", "<?php echo base_url('uploads/vehicle/'); ?>"+other_img[i]);
                        }
                    }else{
                        $('#up_vehicle_form [name="' + i + '"]').val(row);
                    }
                }
            });  
            $.each(data2, function(i, row){
                if($("#up_vehicle_form [value='"+row.service_type+"'").length>0){
                    // $("#up_vehicle_form [type='checkbox'][value='"+row.service_type+"'").trigger("click");
                    if((row.package_type).trim()==""){
                        var tempHld=$("#up_vehicle_form input[value='"+row.service_type+"'").closest(".loopPriceSetup");
                    }else{
                        var tempHld=$("#up_vehicle_form input[value='"+row.package_type+"'").closest(".loopPriceSetup");
                    }
                    tempHld.find("input[name='fare[]']").val(row.fare);
                    tempHld.find("input[name='extra_km[]']").val(row.extra_km);
                    tempHld.find("input[name='extra_hr[]']").val(row.extra_hr);
                    tempHld.find("input[name='min_hr[]']").val(row.min_hr);
                    tempHld.find("input[name='min_km[]']").val(row.min_km);
                    
                }
            });    
        }
    });
}
$(document).on("change", "#up_vehicle_form input[type='file']", function(e){
    var formEle = new FormData();
    var hldImgEle=$(this).closest(".car_pic").find("img");
    formEle.append([csrfName], csrfHash);
    formEle.append($(this).attr("name"), $(this)[0].files[0]);
    formEle.append('id', $(this).closest("#up_vehicle_form").find("input[name='id']").val());
    formEle.append('old_img', hldImgEle.attr("src")==""?"":hldImgEle.attr("src").split("/").pop());
    formEle.append('img_pos', $(this).attr("name"));
    $.ajax({  
        url:base_url+"/admin/Admin_view_vehicle/update_vehicle_img",
        processData: false,
        contentType: false,
        method:'POST', 
        data:formEle,
        dataType: 'JSON',
        success:function(data){
            webinaToast({type: data.type, message: data.text});
            if(data.type=="success"){
                hldImgEle.attr("src", base_url+"/uploads/vehicle/"+data.img);
            }
        }
    });
});
$(document).on("click", ".delimg", function(){
    if(window.confirm("Are you sure to remove?")){
        var self=this;
        $.ajax({  
            url:base_url+"/admin/Admin_view_vehicle/delete_vehicle_img",
            method:'POST', 
            data:{[csrfName]:csrfHash, id:$(self).closest("#up_vehicle_form").find("input[name='id']").val(), old_img:$(self).closest(".car_pic").find("img").attr("src").split("/").pop()},
            dataType: 'JSON',
            success:function(data){
                webinaToast({type: data.type, message: data.text});
                if(data.type=="success"){
                    $(self).closest(".car_pic").find("img").attr("src", "");
                    $(self).closest(".car_pic").find("input[type='file']").val("");
                }
            }
        });
    }
});

function vehicle_delete_data(id){
    if(window.confirm("Are you sure to delete it?")){
        $.ajax({
            url:"<?php echo base_url('admin/Admin_view_vehicle/vehicle_delete_data'); ?>",
            method:"POST",
            data:{[csrfName]:csrfHash, id:id},
            dataType: "JSON",
            success:function(data){
                webinaToast({type: data.type, message: data.text});
                if(data.type=='success'){
                    reload_data_table("#vehicle_datatable");
                }
            }
        });
    }
}
/*
$(document).on("click", ".ope_price", function(){
    if ($(this).find('input').is(':checked')) {
        $(this).next(".service_prices").slideDown();
    }else{
        $(this).next(".service_prices").slideUp();
    }
});
*/
$(document).on("change", "form input[type='file']", function(e){
    $(this).closest(".car_pic").find("img").attr("src", URL.createObjectURL(e.target.files[0]));
});
</script>

</body>
</html>



