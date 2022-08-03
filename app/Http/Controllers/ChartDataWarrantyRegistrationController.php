<?php

namespace App\Http\Controllers;

use App\Models\Warranty_registration;
use Illuminate\Http\Request;

class ChartDataWarrantyRegistrationController extends Controller
{

	function getAllMonths(){

		$month_array = array();
		$warrantyRegistrations_dates = Warranty_registration::orderBy( 'created_at', 'ASC' )->pluck( 'created_at' );
		$warrantyRegistrations_dates = json_decode( $warrantyRegistrations_dates );

		if ( ! empty( $warrantyRegistrations_dates ) ) {
			foreach ( $warrantyRegistrations_dates as $unformatted_date ) {
				$date = new \DateTime( $unformatted_date);
				$month_no = $date->format( 'm' );
				$month_name = $date->format( 'M' );
				$month_array[ $month_no ] = $month_name;
			}
		}
		return $month_array;
	}

	function getMonthlyPostCount( $month ) {
		$monthly_warrantyRegistration_count = Warranty_registration::whereMonth( 'created_at', $month )->get()->count();
		return $monthly_warrantyRegistration_count;
	}

	function getMonthlywarrantyRegistrationData() {

		$monthly_warrantyRegistration_count_array = array();
		$month_array = $this->getAllMonths();
		$month_name_array = array();
		if ( ! empty( $month_array ) ) {
			foreach ( $month_array as $month_no => $month_name ){
				$monthly_warrantyRegistration_count = $this->getMonthlyPostCount( $month_no );
				array_push( $monthly_warrantyRegistration_count_array, $monthly_warrantyRegistration_count );
				array_push( $month_name_array, $month_name );
			}
		}

		$max_no = max( $monthly_warrantyRegistration_count_array );
		$max = round(( $max_no + 10/2 ) / 10 ) * 10;
		$monthly_warrantyRegistration_data_array = array(
			'months' => $month_name_array,
			'warrantyRegistration_count_data' => $monthly_warrantyRegistration_count_array,
			'max' => $max,
		);

		return $monthly_warrantyRegistration_data_array;

    }
}
