<?php

namespace App\Http\Controllers;

use App\Models\Warranty_extend;
use Illuminate\Http\Request;

class ChartDataWarrantyExtendController extends Controller
{

	function getAllMonths(){

		$month_array = array();
		$warrantyExtends_dates = Warranty_extend::orderBy( 'created_at', 'ASC' )->pluck( 'created_at' );
		$warrantyExtends_dates = json_decode( $warrantyExtends_dates );

		if ( ! empty( $warrantyExtends_dates ) ) {
			foreach ( $warrantyExtends_dates as $unformatted_date ) {
				$date = new \DateTime( $unformatted_date);
				$month_no = $date->format( 'm' );
				$month_name = $date->format( 'M' );
				$month_array[ $month_no ] = $month_name;
			}
		}
		return $month_array;
	}

	function getMonthlywarrantyExtendCount( $month ) {
		$monthly_warrantyExtend_count = Warranty_extend::whereMonth( 'created_at', $month )->get()->count();
		return $monthly_warrantyExtend_count;
	}

	function getMonthlyWarrantyExtendData() {

		$monthly_warrantyExtend_count_array = array();
		$month_array = $this->getAllMonths();
		$month_name_array = array();
		if ( ! empty( $month_array ) ) {
			foreach ( $month_array as $month_no => $month_name ){
				$monthly_warrantyExtend_count = $this->getMonthlywarrantyExtendCount( $month_no );
				array_push( $monthly_warrantyExtend_count_array, $monthly_warrantyExtend_count );
				array_push( $month_name_array, $month_name );
			}
		}

		$max_no = max( $monthly_warrantyExtend_count_array );
		$max = round(( $max_no + 10/2 ) / 10 ) * 10;
		$monthly_warrantyExtend_data_array = array(
			'months' => $month_name_array,
			'warrantyExtend_count_data' => $monthly_warrantyExtend_count_array,
			'max' => $max,
		);

		return $monthly_warrantyExtend_data_array;

    }
}
