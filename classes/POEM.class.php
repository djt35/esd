<?php
/*
 * Author: David Tate  - www.gieqs.com
 *
 * Create Date: 10-04-2020
 *
 * DJT 2019
 *
 * License: LGPL
 *
 */
require_once 'DataBaseMysqlPDO.class.php';

Class POEM {

	private $id; //int(11)
	private $MRN; //int(8)
	private $DOB; //varchar(10)
	private $comorbidity; //int(1)
	private $comorbidity_other; //varchar(35)
	private $weight; //decimal(4,1)
	private $medication_aspirin; //int(1)
	private $medication_clopidogrel; //int(1)
	private $medication_warfarin; //int(1)
	private $medication_other; //varchar(27)
	private $previous_treatment_PPI; //int(1)
	private $previous_treatment_CACB; //int(1)
	private $previous_treatment_NITR; //int(1)
	private $previous_treatment_SSRI; //int(1)
	private $previous_treatment_Dilatation; //int(1)
	private $previous_treatment_botulinum; //int(1)
	private $weight_loss; //int(2)
	private $symptoms_regurg; //int(1)
	private $symptoms_dysphagia; //int(1)
	private $symptoms_chestpain; //int(1)
	private $symptoms_heartburn; //int(1)
	private $symptoms_other; //varchar(10)
	private $Eckart_prior; //int(2)
	private $prev_hrm; //int(1)
	private $prev_hrm_rp; //decimal(4,1)
	private $prev_hrm_relaxLES; //decimal(4,1)
	private $prev_hrm_UES; //int(1)
	private $prev_hrm_diagnosis; //int(1)
	private $barium_swallow_date; //varchar(10)
	private $barium_swallow_result; //int(1)
	private $gastroscopy_prev; //int(1)
	private $POEM_duration_total; //int(3)
	private $POEM_duration_tunnel; //int(3)
	private $POEM_GOJ_distance; //int(2)
	private $POEM_incision_distance; //int(2)
	private $POEM_incision_position; //int(2)
	private $POEM_myotomy_length; //int(2)
	private $POEM_perforation; //int(1)
	private $POEM_IPB; //int(1)
	private $POEM_current; //int(1)
	private $POEM_number_clips; //int(1)
	private $POEM_glucagon; //int(1)
	private $POEM_buscopan; //int(2)
	private $POEM_antibiotics; //int(1)
	private $POEM_complication; //int(1)
	private $POEM_complication_type; //int(1)
	private $POEM_admission_days; //int(1)
	private $post_symptoms; //int(1)
	private $post_Eckart; //int(1)
	private $post_HRM_resting; //int(3)
	private $post_HRM_GOJ; //int(2)
	private $_k_patient; //int(2)
	private $post_HRM_relaxLOS; //int(3)
	private $post_HRM_UESnormal; //int(1)
	private $post_HRM_diagnosis; //int(1)
	private $post_bariumswallow_date; //varchar(10)
	private $post_bariumswallow_diagnosis; //varchar(10)
	private $post_gastroscopy; //int(8)
	private $post_gastroscopy_result; //int(1)
	private $post_datecollected; //varchar(10)
	private $current_weight; //varchar(10)
	private $diagnosis; //int(1)
	private $barium_swallow_done; //int(1)
	private $ComplicationDetails; //varchar(91)
	private $ProcedureDate; //varchar(10)
	private $CompleteFUCheck; //int(1)
	private $Referrer; //varchar(20)
	private $ReferrerFax; //decimal(10,9)
	private $ReferrerEmail; //varchar(10)
	private $Firstname; //varchar(9)
	private $Surname; //varchar(10)
	private $IPSubcutEmphysema; //int(1)
	private $IPSubcutEmphysemaMx; //int(1)
	private $gastroscopy_prevdilated; //int(1)
	private $gastroscopy_prevresistance; //int(1)
	private $gastroscopy_prevopenCOJ; //int(1)
	private $gastroscopy_prevspasm; //int(1)
	private $gastroscopy_prevother; //varchar(33)
	private $post_Eckart_dysphagia; //varchar(10)
	private $post_Eckart_regurgitation; //varchar(10)
	private $post_Eckart_pain; //varchar(10)
	private $post_Eckart_wtloss; //varchar(10)
	private $pre_Eckart_dysphagia; //varchar(10)
	private $pre_Eckart_regurgitation; //varchar(10)
	private $pre_Eckart_wtloss; //varchar(10)
	private $pre_Eckart_pain; //varchar(10)
	private $connection;

	public function __construct(){
		$this->connection = new DataBaseMysqlPDO();
	}

    /**
     * New object to the class. Don�t forget to save this new object "as new" by using the function $class->Save_Active_Row_as_New();
     *
     */
	public function New_POEM($MRN,$DOB,$comorbidity,$comorbidity_other,$weight,$medication_aspirin,$medication_clopidogrel,$medication_warfarin,$medication_other,$previous_treatment_PPI,$previous_treatment_CACB,$previous_treatment_NITR,$previous_treatment_SSRI,$previous_treatment_Dilatation,$previous_treatment_botulinum,$weight_loss,$symptoms_regurg,$symptoms_dysphagia,$symptoms_chestpain,$symptoms_heartburn,$symptoms_other,$Eckart_prior,$prev_hrm,$prev_hrm_rp,$prev_hrm_relaxLES,$prev_hrm_UES,$prev_hrm_diagnosis,$barium_swallow_date,$barium_swallow_result,$gastroscopy_prev,$POEM_duration_total,$POEM_duration_tunnel,$POEM_GOJ_distance,$POEM_incision_distance,$POEM_incision_position,$POEM_myotomy_length,$POEM_perforation,$POEM_IPB,$POEM_current,$POEM_number_clips,$POEM_glucagon,$POEM_buscopan,$POEM_antibiotics,$POEM_complication,$POEM_complication_type,$POEM_admission_days,$post_symptoms,$post_Eckart,$post_HRM_resting,$post_HRM_GOJ,$_k_patient,$post_HRM_relaxLOS,$post_HRM_UESnormal,$post_HRM_diagnosis,$post_bariumswallow_date,$post_bariumswallow_diagnosis,$post_gastroscopy,$post_gastroscopy_result,$post_datecollected,$current_weight,$diagnosis,$barium_swallow_done,$ComplicationDetails,$ProcedureDate,$CompleteFUCheck,$Referrer,$ReferrerFax,$ReferrerEmail,$Firstname,$Surname,$IPSubcutEmphysema,$IPSubcutEmphysemaMx,$gastroscopy_prevdilated,$gastroscopy_prevresistance,$gastroscopy_prevopenCOJ,$gastroscopy_prevspasm,$gastroscopy_prevother,$post_Eckart_dysphagia,$post_Eckart_regurgitation,$post_Eckart_pain,$post_Eckart_wtloss,$pre_Eckart_dysphagia,$pre_Eckart_regurgitation,$pre_Eckart_wtloss,$pre_Eckart_pain){
		$this->MRN = $MRN;
		$this->DOB = $DOB;
		$this->comorbidity = $comorbidity;
		$this->comorbidity_other = $comorbidity_other;
		$this->weight = $weight;
		$this->medication_aspirin = $medication_aspirin;
		$this->medication_clopidogrel = $medication_clopidogrel;
		$this->medication_warfarin = $medication_warfarin;
		$this->medication_other = $medication_other;
		$this->previous_treatment_PPI = $previous_treatment_PPI;
		$this->previous_treatment_CACB = $previous_treatment_CACB;
		$this->previous_treatment_NITR = $previous_treatment_NITR;
		$this->previous_treatment_SSRI = $previous_treatment_SSRI;
		$this->previous_treatment_Dilatation = $previous_treatment_Dilatation;
		$this->previous_treatment_botulinum = $previous_treatment_botulinum;
		$this->weight_loss = $weight_loss;
		$this->symptoms_regurg = $symptoms_regurg;
		$this->symptoms_dysphagia = $symptoms_dysphagia;
		$this->symptoms_chestpain = $symptoms_chestpain;
		$this->symptoms_heartburn = $symptoms_heartburn;
		$this->symptoms_other = $symptoms_other;
		$this->Eckart_prior = $Eckart_prior;
		$this->prev_hrm = $prev_hrm;
		$this->prev_hrm_rp = $prev_hrm_rp;
		$this->prev_hrm_relaxLES = $prev_hrm_relaxLES;
		$this->prev_hrm_UES = $prev_hrm_UES;
		$this->prev_hrm_diagnosis = $prev_hrm_diagnosis;
		$this->barium_swallow_date = $barium_swallow_date;
		$this->barium_swallow_result = $barium_swallow_result;
		$this->gastroscopy_prev = $gastroscopy_prev;
		$this->POEM_duration_total = $POEM_duration_total;
		$this->POEM_duration_tunnel = $POEM_duration_tunnel;
		$this->POEM_GOJ_distance = $POEM_GOJ_distance;
		$this->POEM_incision_distance = $POEM_incision_distance;
		$this->POEM_incision_position = $POEM_incision_position;
		$this->POEM_myotomy_length = $POEM_myotomy_length;
		$this->POEM_perforation = $POEM_perforation;
		$this->POEM_IPB = $POEM_IPB;
		$this->POEM_current = $POEM_current;
		$this->POEM_number_clips = $POEM_number_clips;
		$this->POEM_glucagon = $POEM_glucagon;
		$this->POEM_buscopan = $POEM_buscopan;
		$this->POEM_antibiotics = $POEM_antibiotics;
		$this->POEM_complication = $POEM_complication;
		$this->POEM_complication_type = $POEM_complication_type;
		$this->POEM_admission_days = $POEM_admission_days;
		$this->post_symptoms = $post_symptoms;
		$this->post_Eckart = $post_Eckart;
		$this->post_HRM_resting = $post_HRM_resting;
		$this->post_HRM_GOJ = $post_HRM_GOJ;
		$this->_k_patient = $_k_patient;
		$this->post_HRM_relaxLOS = $post_HRM_relaxLOS;
		$this->post_HRM_UESnormal = $post_HRM_UESnormal;
		$this->post_HRM_diagnosis = $post_HRM_diagnosis;
		$this->post_bariumswallow_date = $post_bariumswallow_date;
		$this->post_bariumswallow_diagnosis = $post_bariumswallow_diagnosis;
		$this->post_gastroscopy = $post_gastroscopy;
		$this->post_gastroscopy_result = $post_gastroscopy_result;
		$this->post_datecollected = $post_datecollected;
		$this->current_weight = $current_weight;
		$this->diagnosis = $diagnosis;
		$this->barium_swallow_done = $barium_swallow_done;
		$this->ComplicationDetails = $ComplicationDetails;
		$this->ProcedureDate = $ProcedureDate;
		$this->CompleteFUCheck = $CompleteFUCheck;
		$this->Referrer = $Referrer;
		$this->ReferrerFax = $ReferrerFax;
		$this->ReferrerEmail = $ReferrerEmail;
		$this->Firstname = $Firstname;
		$this->Surname = $Surname;
		$this->IPSubcutEmphysema = $IPSubcutEmphysema;
		$this->IPSubcutEmphysemaMx = $IPSubcutEmphysemaMx;
		$this->gastroscopy_prevdilated = $gastroscopy_prevdilated;
		$this->gastroscopy_prevresistance = $gastroscopy_prevresistance;
		$this->gastroscopy_prevopenCOJ = $gastroscopy_prevopenCOJ;
		$this->gastroscopy_prevspasm = $gastroscopy_prevspasm;
		$this->gastroscopy_prevother = $gastroscopy_prevother;
		$this->post_Eckart_dysphagia = $post_Eckart_dysphagia;
		$this->post_Eckart_regurgitation = $post_Eckart_regurgitation;
		$this->post_Eckart_pain = $post_Eckart_pain;
		$this->post_Eckart_wtloss = $post_Eckart_wtloss;
		$this->pre_Eckart_dysphagia = $pre_Eckart_dysphagia;
		$this->pre_Eckart_regurgitation = $pre_Eckart_regurgitation;
		$this->pre_Eckart_wtloss = $pre_Eckart_wtloss;
		$this->pre_Eckart_pain = $pre_Eckart_pain;
	}

    /**
     * Load one row into var_class. To use the vars use for exemple echo $class->getVar_name;
     *
     * @param key_table_type $key_row
     *
     */
	public function Load_from_key($key_row){
		$result = $this->connection->RunQuery("Select * from POEM where id = \"$key_row\" ");
		while($row = $result->fetch(PDO::FETCH_ASSOC)){
			$this->id = $row["id"];
			$this->MRN = $row["MRN"];
			$this->DOB = $row["DOB"];
			$this->comorbidity = $row["comorbidity"];
			$this->comorbidity_other = $row["comorbidity_other"];
			$this->weight = $row["weight"];
			$this->medication_aspirin = $row["medication_aspirin"];
			$this->medication_clopidogrel = $row["medication_clopidogrel"];
			$this->medication_warfarin = $row["medication_warfarin"];
			$this->medication_other = $row["medication_other"];
			$this->previous_treatment_PPI = $row["previous_treatment_PPI"];
			$this->previous_treatment_CACB = $row["previous_treatment_CACB"];
			$this->previous_treatment_NITR = $row["previous_treatment_NITR"];
			$this->previous_treatment_SSRI = $row["previous_treatment_SSRI"];
			$this->previous_treatment_Dilatation = $row["previous_treatment_Dilatation"];
			$this->previous_treatment_botulinum = $row["previous_treatment_botulinum"];
			$this->weight_loss = $row["weight_loss"];
			$this->symptoms_regurg = $row["symptoms_regurg"];
			$this->symptoms_dysphagia = $row["symptoms_dysphagia"];
			$this->symptoms_chestpain = $row["symptoms_chestpain"];
			$this->symptoms_heartburn = $row["symptoms_heartburn"];
			$this->symptoms_other = $row["symptoms_other"];
			$this->Eckart_prior = $row["Eckart_prior"];
			$this->prev_hrm = $row["prev_hrm"];
			$this->prev_hrm_rp = $row["prev_hrm_rp"];
			$this->prev_hrm_relaxLES = $row["prev_hrm_relaxLES"];
			$this->prev_hrm_UES = $row["prev_hrm_UES"];
			$this->prev_hrm_diagnosis = $row["prev_hrm_diagnosis"];
			$this->barium_swallow_date = $row["barium_swallow_date"];
			$this->barium_swallow_result = $row["barium_swallow_result"];
			$this->gastroscopy_prev = $row["gastroscopy_prev"];
			$this->POEM_duration_total = $row["POEM_duration_total"];
			$this->POEM_duration_tunnel = $row["POEM_duration_tunnel"];
			$this->POEM_GOJ_distance = $row["POEM_GOJ_distance"];
			$this->POEM_incision_distance = $row["POEM_incision_distance"];
			$this->POEM_incision_position = $row["POEM_incision_position"];
			$this->POEM_myotomy_length = $row["POEM_myotomy_length"];
			$this->POEM_perforation = $row["POEM_perforation"];
			$this->POEM_IPB = $row["POEM_IPB"];
			$this->POEM_current = $row["POEM_current"];
			$this->POEM_number_clips = $row["POEM_number_clips"];
			$this->POEM_glucagon = $row["POEM_glucagon"];
			$this->POEM_buscopan = $row["POEM_buscopan"];
			$this->POEM_antibiotics = $row["POEM_antibiotics"];
			$this->POEM_complication = $row["POEM_complication"];
			$this->POEM_complication_type = $row["POEM_complication_type"];
			$this->POEM_admission_days = $row["POEM_admission_days"];
			$this->post_symptoms = $row["post_symptoms"];
			$this->post_Eckart = $row["post_Eckart"];
			$this->post_HRM_resting = $row["post_HRM_resting"];
			$this->post_HRM_GOJ = $row["post_HRM_GOJ"];
			$this->_k_patient = $row["_k_patient"];
			$this->post_HRM_relaxLOS = $row["post_HRM_relaxLOS"];
			$this->post_HRM_UESnormal = $row["post_HRM_UESnormal"];
			$this->post_HRM_diagnosis = $row["post_HRM_diagnosis"];
			$this->post_bariumswallow_date = $row["post_bariumswallow_date"];
			$this->post_bariumswallow_diagnosis = $row["post_bariumswallow_diagnosis"];
			$this->post_gastroscopy = $row["post_gastroscopy"];
			$this->post_gastroscopy_result = $row["post_gastroscopy_result"];
			$this->post_datecollected = $row["post_datecollected"];
			$this->current_weight = $row["current_weight"];
			$this->diagnosis = $row["diagnosis"];
			$this->barium_swallow_done = $row["barium_swallow_done"];
			$this->ComplicationDetails = $row["ComplicationDetails"];
			$this->ProcedureDate = $row["ProcedureDate"];
			$this->CompleteFUCheck = $row["CompleteFUCheck"];
			$this->Referrer = $row["Referrer"];
			$this->ReferrerFax = $row["ReferrerFax"];
			$this->ReferrerEmail = $row["ReferrerEmail"];
			$this->Firstname = $row["Firstname"];
			$this->Surname = $row["Surname"];
			$this->IPSubcutEmphysema = $row["IPSubcutEmphysema"];
			$this->IPSubcutEmphysemaMx = $row["IPSubcutEmphysemaMx"];
			$this->gastroscopy_prevdilated = $row["gastroscopy_prevdilated"];
			$this->gastroscopy_prevresistance = $row["gastroscopy_prevresistance"];
			$this->gastroscopy_prevopenCOJ = $row["gastroscopy_prevopenCOJ"];
			$this->gastroscopy_prevspasm = $row["gastroscopy_prevspasm"];
			$this->gastroscopy_prevother = $row["gastroscopy_prevother"];
			$this->post_Eckart_dysphagia = $row["post_Eckart_dysphagia"];
			$this->post_Eckart_regurgitation = $row["post_Eckart_regurgitation"];
			$this->post_Eckart_pain = $row["post_Eckart_pain"];
			$this->post_Eckart_wtloss = $row["post_Eckart_wtloss"];
			$this->pre_Eckart_dysphagia = $row["pre_Eckart_dysphagia"];
			$this->pre_Eckart_regurgitation = $row["pre_Eckart_regurgitation"];
			$this->pre_Eckart_wtloss = $row["pre_Eckart_wtloss"];
			$this->pre_Eckart_pain = $row["pre_Eckart_pain"];
		}
	}
    /**
 * Load specified number of rows and output to JSON. To use the vars use for exemple echo $class->getVar_name;
 *
 * @param key_table_type $key_row
 *
 */
	public function Load_records_limit_json($y, $x=0){
$q = "Select * from `POEM` LIMIT " . $x . ", " . $y;
		$result = $this->connection->RunQuery($q);
							$rowReturn = array();
						$x = 0;
						$nRows = $result->rowCount();
						if ($nRows > 0){

					while($row = $result->fetch(PDO::FETCH_ASSOC)){
			$rowReturn[$x]["id"] = $row["id"];
			$rowReturn[$x]["MRN"] = $row["MRN"];
			$rowReturn[$x]["DOB"] = $row["DOB"];
			$rowReturn[$x]["comorbidity"] = $row["comorbidity"];
			$rowReturn[$x]["comorbidity_other"] = $row["comorbidity_other"];
			$rowReturn[$x]["weight"] = $row["weight"];
			$rowReturn[$x]["medication_aspirin"] = $row["medication_aspirin"];
			$rowReturn[$x]["medication_clopidogrel"] = $row["medication_clopidogrel"];
			$rowReturn[$x]["medication_warfarin"] = $row["medication_warfarin"];
			$rowReturn[$x]["medication_other"] = $row["medication_other"];
			$rowReturn[$x]["previous_treatment_PPI"] = $row["previous_treatment_PPI"];
			$rowReturn[$x]["previous_treatment_CACB"] = $row["previous_treatment_CACB"];
			$rowReturn[$x]["previous_treatment_NITR"] = $row["previous_treatment_NITR"];
			$rowReturn[$x]["previous_treatment_SSRI"] = $row["previous_treatment_SSRI"];
			$rowReturn[$x]["previous_treatment_Dilatation"] = $row["previous_treatment_Dilatation"];
			$rowReturn[$x]["previous_treatment_botulinum"] = $row["previous_treatment_botulinum"];
			$rowReturn[$x]["weight_loss"] = $row["weight_loss"];
			$rowReturn[$x]["symptoms_regurg"] = $row["symptoms_regurg"];
			$rowReturn[$x]["symptoms_dysphagia"] = $row["symptoms_dysphagia"];
			$rowReturn[$x]["symptoms_chestpain"] = $row["symptoms_chestpain"];
			$rowReturn[$x]["symptoms_heartburn"] = $row["symptoms_heartburn"];
			$rowReturn[$x]["symptoms_other"] = $row["symptoms_other"];
			$rowReturn[$x]["Eckart_prior"] = $row["Eckart_prior"];
			$rowReturn[$x]["prev_hrm"] = $row["prev_hrm"];
			$rowReturn[$x]["prev_hrm_rp"] = $row["prev_hrm_rp"];
			$rowReturn[$x]["prev_hrm_relaxLES"] = $row["prev_hrm_relaxLES"];
			$rowReturn[$x]["prev_hrm_UES"] = $row["prev_hrm_UES"];
			$rowReturn[$x]["prev_hrm_diagnosis"] = $row["prev_hrm_diagnosis"];
			$rowReturn[$x]["barium_swallow_date"] = $row["barium_swallow_date"];
			$rowReturn[$x]["barium_swallow_result"] = $row["barium_swallow_result"];
			$rowReturn[$x]["gastroscopy_prev"] = $row["gastroscopy_prev"];
			$rowReturn[$x]["POEM_duration_total"] = $row["POEM_duration_total"];
			$rowReturn[$x]["POEM_duration_tunnel"] = $row["POEM_duration_tunnel"];
			$rowReturn[$x]["POEM_GOJ_distance"] = $row["POEM_GOJ_distance"];
			$rowReturn[$x]["POEM_incision_distance"] = $row["POEM_incision_distance"];
			$rowReturn[$x]["POEM_incision_position"] = $row["POEM_incision_position"];
			$rowReturn[$x]["POEM_myotomy_length"] = $row["POEM_myotomy_length"];
			$rowReturn[$x]["POEM_perforation"] = $row["POEM_perforation"];
			$rowReturn[$x]["POEM_IPB"] = $row["POEM_IPB"];
			$rowReturn[$x]["POEM_current"] = $row["POEM_current"];
			$rowReturn[$x]["POEM_number_clips"] = $row["POEM_number_clips"];
			$rowReturn[$x]["POEM_glucagon"] = $row["POEM_glucagon"];
			$rowReturn[$x]["POEM_buscopan"] = $row["POEM_buscopan"];
			$rowReturn[$x]["POEM_antibiotics"] = $row["POEM_antibiotics"];
			$rowReturn[$x]["POEM_complication"] = $row["POEM_complication"];
			$rowReturn[$x]["POEM_complication_type"] = $row["POEM_complication_type"];
			$rowReturn[$x]["POEM_admission_days"] = $row["POEM_admission_days"];
			$rowReturn[$x]["post_symptoms"] = $row["post_symptoms"];
			$rowReturn[$x]["post_Eckart"] = $row["post_Eckart"];
			$rowReturn[$x]["post_HRM_resting"] = $row["post_HRM_resting"];
			$rowReturn[$x]["post_HRM_GOJ"] = $row["post_HRM_GOJ"];
			$rowReturn[$x]["_k_patient"] = $row["_k_patient"];
			$rowReturn[$x]["post_HRM_relaxLOS"] = $row["post_HRM_relaxLOS"];
			$rowReturn[$x]["post_HRM_UESnormal"] = $row["post_HRM_UESnormal"];
			$rowReturn[$x]["post_HRM_diagnosis"] = $row["post_HRM_diagnosis"];
			$rowReturn[$x]["post_bariumswallow_date"] = $row["post_bariumswallow_date"];
			$rowReturn[$x]["post_bariumswallow_diagnosis"] = $row["post_bariumswallow_diagnosis"];
			$rowReturn[$x]["post_gastroscopy"] = $row["post_gastroscopy"];
			$rowReturn[$x]["post_gastroscopy_result"] = $row["post_gastroscopy_result"];
			$rowReturn[$x]["post_datecollected"] = $row["post_datecollected"];
			$rowReturn[$x]["current_weight"] = $row["current_weight"];
			$rowReturn[$x]["diagnosis"] = $row["diagnosis"];
			$rowReturn[$x]["barium_swallow_done"] = $row["barium_swallow_done"];
			$rowReturn[$x]["ComplicationDetails"] = $row["ComplicationDetails"];
			$rowReturn[$x]["ProcedureDate"] = $row["ProcedureDate"];
			$rowReturn[$x]["CompleteFUCheck"] = $row["CompleteFUCheck"];
			$rowReturn[$x]["Referrer"] = $row["Referrer"];
			$rowReturn[$x]["ReferrerFax"] = $row["ReferrerFax"];
			$rowReturn[$x]["ReferrerEmail"] = $row["ReferrerEmail"];
			$rowReturn[$x]["Firstname"] = $row["Firstname"];
			$rowReturn[$x]["Surname"] = $row["Surname"];
			$rowReturn[$x]["IPSubcutEmphysema"] = $row["IPSubcutEmphysema"];
			$rowReturn[$x]["IPSubcutEmphysemaMx"] = $row["IPSubcutEmphysemaMx"];
			$rowReturn[$x]["gastroscopy_prevdilated"] = $row["gastroscopy_prevdilated"];
			$rowReturn[$x]["gastroscopy_prevresistance"] = $row["gastroscopy_prevresistance"];
			$rowReturn[$x]["gastroscopy_prevopenCOJ"] = $row["gastroscopy_prevopenCOJ"];
			$rowReturn[$x]["gastroscopy_prevspasm"] = $row["gastroscopy_prevspasm"];
			$rowReturn[$x]["gastroscopy_prevother"] = $row["gastroscopy_prevother"];
			$rowReturn[$x]["post_Eckart_dysphagia"] = $row["post_Eckart_dysphagia"];
			$rowReturn[$x]["post_Eckart_regurgitation"] = $row["post_Eckart_regurgitation"];
			$rowReturn[$x]["post_Eckart_pain"] = $row["post_Eckart_pain"];
			$rowReturn[$x]["post_Eckart_wtloss"] = $row["post_Eckart_wtloss"];
			$rowReturn[$x]["pre_Eckart_dysphagia"] = $row["pre_Eckart_dysphagia"];
			$rowReturn[$x]["pre_Eckart_regurgitation"] = $row["pre_Eckart_regurgitation"];
			$rowReturn[$x]["pre_Eckart_wtloss"] = $row["pre_Eckart_wtloss"];
			$rowReturn[$x]["pre_Eckart_pain"] = $row["pre_Eckart_pain"];
		$x++;		}return json_encode($rowReturn);}

			else{return FALSE;
			}
			
	}
    /**
 * Load specified number of rows and output to JSON. To use the vars use for exemple echo $class->getVar_name;
 *
 * @param key_table_type $key_row
 *
 */
	public function Return_row($key){
$q = "Select * from `POEM` WHERE `id` = $key";
		$result = $this->connection->RunQuery($q);
							$rowReturn = array();
						$x = 0;
						$nRows = $result->rowCount();
						if ($nRows > 0){

					while($row = $result->fetch(PDO::FETCH_ASSOC)){
			$rowReturn[$x]["id"] = $row["id"];
			$rowReturn[$x]["MRN"] = $row["MRN"];
			$rowReturn[$x]["DOB"] = $row["DOB"];
			$rowReturn[$x]["comorbidity"] = $row["comorbidity"];
			$rowReturn[$x]["comorbidity_other"] = $row["comorbidity_other"];
			$rowReturn[$x]["weight"] = $row["weight"];
			$rowReturn[$x]["medication_aspirin"] = $row["medication_aspirin"];
			$rowReturn[$x]["medication_clopidogrel"] = $row["medication_clopidogrel"];
			$rowReturn[$x]["medication_warfarin"] = $row["medication_warfarin"];
			$rowReturn[$x]["medication_other"] = $row["medication_other"];
			$rowReturn[$x]["previous_treatment_PPI"] = $row["previous_treatment_PPI"];
			$rowReturn[$x]["previous_treatment_CACB"] = $row["previous_treatment_CACB"];
			$rowReturn[$x]["previous_treatment_NITR"] = $row["previous_treatment_NITR"];
			$rowReturn[$x]["previous_treatment_SSRI"] = $row["previous_treatment_SSRI"];
			$rowReturn[$x]["previous_treatment_Dilatation"] = $row["previous_treatment_Dilatation"];
			$rowReturn[$x]["previous_treatment_botulinum"] = $row["previous_treatment_botulinum"];
			$rowReturn[$x]["weight_loss"] = $row["weight_loss"];
			$rowReturn[$x]["symptoms_regurg"] = $row["symptoms_regurg"];
			$rowReturn[$x]["symptoms_dysphagia"] = $row["symptoms_dysphagia"];
			$rowReturn[$x]["symptoms_chestpain"] = $row["symptoms_chestpain"];
			$rowReturn[$x]["symptoms_heartburn"] = $row["symptoms_heartburn"];
			$rowReturn[$x]["symptoms_other"] = $row["symptoms_other"];
			$rowReturn[$x]["Eckart_prior"] = $row["Eckart_prior"];
			$rowReturn[$x]["prev_hrm"] = $row["prev_hrm"];
			$rowReturn[$x]["prev_hrm_rp"] = $row["prev_hrm_rp"];
			$rowReturn[$x]["prev_hrm_relaxLES"] = $row["prev_hrm_relaxLES"];
			$rowReturn[$x]["prev_hrm_UES"] = $row["prev_hrm_UES"];
			$rowReturn[$x]["prev_hrm_diagnosis"] = $row["prev_hrm_diagnosis"];
			$rowReturn[$x]["barium_swallow_date"] = $row["barium_swallow_date"];
			$rowReturn[$x]["barium_swallow_result"] = $row["barium_swallow_result"];
			$rowReturn[$x]["gastroscopy_prev"] = $row["gastroscopy_prev"];
			$rowReturn[$x]["POEM_duration_total"] = $row["POEM_duration_total"];
			$rowReturn[$x]["POEM_duration_tunnel"] = $row["POEM_duration_tunnel"];
			$rowReturn[$x]["POEM_GOJ_distance"] = $row["POEM_GOJ_distance"];
			$rowReturn[$x]["POEM_incision_distance"] = $row["POEM_incision_distance"];
			$rowReturn[$x]["POEM_incision_position"] = $row["POEM_incision_position"];
			$rowReturn[$x]["POEM_myotomy_length"] = $row["POEM_myotomy_length"];
			$rowReturn[$x]["POEM_perforation"] = $row["POEM_perforation"];
			$rowReturn[$x]["POEM_IPB"] = $row["POEM_IPB"];
			$rowReturn[$x]["POEM_current"] = $row["POEM_current"];
			$rowReturn[$x]["POEM_number_clips"] = $row["POEM_number_clips"];
			$rowReturn[$x]["POEM_glucagon"] = $row["POEM_glucagon"];
			$rowReturn[$x]["POEM_buscopan"] = $row["POEM_buscopan"];
			$rowReturn[$x]["POEM_antibiotics"] = $row["POEM_antibiotics"];
			$rowReturn[$x]["POEM_complication"] = $row["POEM_complication"];
			$rowReturn[$x]["POEM_complication_type"] = $row["POEM_complication_type"];
			$rowReturn[$x]["POEM_admission_days"] = $row["POEM_admission_days"];
			$rowReturn[$x]["post_symptoms"] = $row["post_symptoms"];
			$rowReturn[$x]["post_Eckart"] = $row["post_Eckart"];
			$rowReturn[$x]["post_HRM_resting"] = $row["post_HRM_resting"];
			$rowReturn[$x]["post_HRM_GOJ"] = $row["post_HRM_GOJ"];
			$rowReturn[$x]["_k_patient"] = $row["_k_patient"];
			$rowReturn[$x]["post_HRM_relaxLOS"] = $row["post_HRM_relaxLOS"];
			$rowReturn[$x]["post_HRM_UESnormal"] = $row["post_HRM_UESnormal"];
			$rowReturn[$x]["post_HRM_diagnosis"] = $row["post_HRM_diagnosis"];
			$rowReturn[$x]["post_bariumswallow_date"] = $row["post_bariumswallow_date"];
			$rowReturn[$x]["post_bariumswallow_diagnosis"] = $row["post_bariumswallow_diagnosis"];
			$rowReturn[$x]["post_gastroscopy"] = $row["post_gastroscopy"];
			$rowReturn[$x]["post_gastroscopy_result"] = $row["post_gastroscopy_result"];
			$rowReturn[$x]["post_datecollected"] = $row["post_datecollected"];
			$rowReturn[$x]["current_weight"] = $row["current_weight"];
			$rowReturn[$x]["diagnosis"] = $row["diagnosis"];
			$rowReturn[$x]["barium_swallow_done"] = $row["barium_swallow_done"];
			$rowReturn[$x]["ComplicationDetails"] = $row["ComplicationDetails"];
			$rowReturn[$x]["ProcedureDate"] = $row["ProcedureDate"];
			$rowReturn[$x]["CompleteFUCheck"] = $row["CompleteFUCheck"];
			$rowReturn[$x]["Referrer"] = $row["Referrer"];
			$rowReturn[$x]["ReferrerFax"] = $row["ReferrerFax"];
			$rowReturn[$x]["ReferrerEmail"] = $row["ReferrerEmail"];
			$rowReturn[$x]["Firstname"] = $row["Firstname"];
			$rowReturn[$x]["Surname"] = $row["Surname"];
			$rowReturn[$x]["IPSubcutEmphysema"] = $row["IPSubcutEmphysema"];
			$rowReturn[$x]["IPSubcutEmphysemaMx"] = $row["IPSubcutEmphysemaMx"];
			$rowReturn[$x]["gastroscopy_prevdilated"] = $row["gastroscopy_prevdilated"];
			$rowReturn[$x]["gastroscopy_prevresistance"] = $row["gastroscopy_prevresistance"];
			$rowReturn[$x]["gastroscopy_prevopenCOJ"] = $row["gastroscopy_prevopenCOJ"];
			$rowReturn[$x]["gastroscopy_prevspasm"] = $row["gastroscopy_prevspasm"];
			$rowReturn[$x]["gastroscopy_prevother"] = $row["gastroscopy_prevother"];
			$rowReturn[$x]["post_Eckart_dysphagia"] = $row["post_Eckart_dysphagia"];
			$rowReturn[$x]["post_Eckart_regurgitation"] = $row["post_Eckart_regurgitation"];
			$rowReturn[$x]["post_Eckart_pain"] = $row["post_Eckart_pain"];
			$rowReturn[$x]["post_Eckart_wtloss"] = $row["post_Eckart_wtloss"];
			$rowReturn[$x]["pre_Eckart_dysphagia"] = $row["pre_Eckart_dysphagia"];
			$rowReturn[$x]["pre_Eckart_regurgitation"] = $row["pre_Eckart_regurgitation"];
			$rowReturn[$x]["pre_Eckart_wtloss"] = $row["pre_Eckart_wtloss"];
			$rowReturn[$x]["pre_Eckart_pain"] = $row["pre_Eckart_pain"];
		$x++;		}return json_encode($rowReturn);}

			else{return FALSE;
			}
			
	}
    

        public function Load_records_limit_json_datatables($y, $x = 0)
            {
            $q = "Select * from `POEM` LIMIT $x, $y";
            $result = $this->connection->RunQuery($q);
            $rowReturn = array();
            $x = 0;
            $nRows = $result->rowCount();
            if ($nRows > 0) {

                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

                    $rowReturn['data'][] = array_map('utf8_encode', $row);
                }
            
                return json_encode($rowReturn);

            } else {
                

                //RETURN AN EMPTY ARRAY RATHER THAN AN ERROR
                $rowReturn['data'] = [];
                
                return json_encode($rowReturn);
            }

        }

    /**
     * Checks if the specified record exists
     *
     * @param key_table_type $key_row
     *
     */
	public function matchRecord($key_row){
		$result = $this->connection->RunQuery("Select * from `POEM` where `id` = '$key_row' ");
		$nRows = $result->rowCount();
			if ($nRows == 1){
				return TRUE;
			}else{
				return FALSE;
			}
	}

    /**
		* Return the number of rows
		*/
	public function numberOfRows(){
		return $this->connection->TotalOfRows('POEM');
	}

    /**
		* Insert statement using PDO
		*/
 public function prepareStatementPDO (){ 
 //need to only update those which are set 
 $ov = get_object_vars($this); 
if ($ov['connection'] != ''){
			unset($ov['connection']);
		} 
if ($ov['id'] != ''){
			unset($ov['id']);
		} 
$ovMod = array(); 
foreach ($ov as $key=>$value){

			if ($value != ''){

				$key = '`' . $key . '`';

				$ovMod[$key] = $value;
			}

			}
$ovMod2 = array(); 
foreach ($ov as $key=>$value){

			if ($value != ''){

				$key = '' . $key . '';

				$ovMod2[$key] = $value;
			}

		} 
$ovMod3 = array(); 
foreach ($ov as $key=>$value){

			if ($value != ''){

				$key = ':' . $key;

				$ovMod3[$key] = $value;
			}

		} 
foreach ($ovMod as $key => $value) {

            $value = addslashes($value);
			$value = "'$value'";
			$updates[] = "$value";

		} 
$implodeArray = implode(', ', $updates); 
//get number of terms in update
					//need only the keys first

					$keys = implode(", ", array_keys($ovMod));
					$keys2 = implode(", ", array_keys($ovMod3));
			
//get number of keys

				$numberOfTerms = count($ovMod);
		
//echo $numberOfTerms;

		$termsToInsert = ''; 
$x=0;

		foreach ($ovMod as $key=>$value){

			$termsToInsert .= ( $x !== ($numberOfTerms -1) ) ? "? ," : " ?";

			$x++;

		} 
$q = "INSERT INTO `POEM` ($keys) VALUES ($keys2)";
		
 $stmt = $this->connection->prepare($q); 
$stmt->execute($ovMod3); 
return $this->connection->conn->lastInsertId(); 
	}

    /**
		* Update statement using PDO
		*/
 public function prepareStatementPDOUpdate (){ 
 //need to only update those which are set 
 $ov = get_object_vars($this); 
if ($ov['connection'] != ''){
			unset($ov['connection']);
		} 
if ($ov['id'] != ''){
			unset($ov['id']);
		} 
if ($ov['updated'] != ''){
			unset($ov['updated']);
		} 
$ovMod = array(); 
foreach ($ov as $key=>$value){

			if ($value != ''){

				$key = '`' . $key . '`';

				$ovMod[$key] = $value;
			}

			}
$ovMod2 = array(); 
foreach ($ov as $key=>$value){

			if ($value != ''){

				$key = '' . $key . '';

				$ovMod2[$key] = $value;
			}

		} 
$ovMod3 = array(); 
foreach ($ov as $key=>$value){

			if ($value != ''){

				$key = ':' . $key;

				$ovMod3[$key] = $value;
			}

		} 
foreach ($ovMod as $key => $value) {

            $value = addslashes($value);
			$value = "'$value'";
			$updates[] = "$key=$value";

		} 
$implodeArray = implode(', ', $updates); 
//get number of terms in update
					//need only the keys first

					$keys = implode(", ", array_keys($ovMod));
					$keys2 = implode(", ", array_keys($ovMod3));
			
//get number of keys

				$numberOfTerms = count($ovMod);
		
//echo $numberOfTerms;

		$termsToInsert = ''; 
$x=0;

		foreach ($ovMod as $key=>$value){

			$termsToInsert .= ( $x !== ($numberOfTerms -1) ) ? "? ," : " ?";

			$x++;

		} 
$q = "UPDATE `POEM` SET $implodeArray WHERE `id` = '$this->id'";

		
 $stmt = $this->connection->RunQuery($q); 
 return $stmt->rowCount(); 
	}


    /**
     * Delete the row by using the key as arg
     *
     * @param key_table_type $key_row
     *
     */
	public function Delete_row_from_key($key_row){
		$result = $this->connection->RunQuery("DELETE FROM `POEM` WHERE `id` = $key_row");
		return $result->rowCount();
	}

    /**
     * Returns array of keys order by $column -> name of column $order -> desc or acs
     *
     * @param string $column
     * @param string $order
     */
	public function GetKeysOrderBy($column, $order){
		$keys = array(); $i = 0;
		$result = $this->connection->RunQuery("SELECT id from POEM order by $column $order");
			while($row = $result->fetch_array(MYSQLI_ASSOC)){
				$keys[$i] = $row["id"];
				$i++;
			}
	return $keys;
	}

	/**
	 * @return id - int(11)
	 */
	public function getid(){
		return $this->id;
	}

	/**
	 * @return MRN - int(8)
	 */
	public function getMRN(){
		return $this->MRN;
	}

	/**
	 * @return DOB - varchar(10)
	 */
	public function getDOB(){
		return $this->DOB;
	}

	/**
	 * @return comorbidity - int(1)
	 */
	public function getcomorbidity(){
		return $this->comorbidity;
	}

	/**
	 * @return comorbidity_other - varchar(35)
	 */
	public function getcomorbidity_other(){
		return $this->comorbidity_other;
	}

	/**
	 * @return weight - decimal(4,1)
	 */
	public function getweight(){
		return $this->weight;
	}

	/**
	 * @return medication_aspirin - int(1)
	 */
	public function getmedication_aspirin(){
		return $this->medication_aspirin;
	}

	/**
	 * @return medication_clopidogrel - int(1)
	 */
	public function getmedication_clopidogrel(){
		return $this->medication_clopidogrel;
	}

	/**
	 * @return medication_warfarin - int(1)
	 */
	public function getmedication_warfarin(){
		return $this->medication_warfarin;
	}

	/**
	 * @return medication_other - varchar(27)
	 */
	public function getmedication_other(){
		return $this->medication_other;
	}

	/**
	 * @return previous_treatment_PPI - int(1)
	 */
	public function getprevious_treatment_PPI(){
		return $this->previous_treatment_PPI;
	}

	/**
	 * @return previous_treatment_CACB - int(1)
	 */
	public function getprevious_treatment_CACB(){
		return $this->previous_treatment_CACB;
	}

	/**
	 * @return previous_treatment_NITR - int(1)
	 */
	public function getprevious_treatment_NITR(){
		return $this->previous_treatment_NITR;
	}

	/**
	 * @return previous_treatment_SSRI - int(1)
	 */
	public function getprevious_treatment_SSRI(){
		return $this->previous_treatment_SSRI;
	}

	/**
	 * @return previous_treatment_Dilatation - int(1)
	 */
	public function getprevious_treatment_Dilatation(){
		return $this->previous_treatment_Dilatation;
	}

	/**
	 * @return previous_treatment_botulinum - int(1)
	 */
	public function getprevious_treatment_botulinum(){
		return $this->previous_treatment_botulinum;
	}

	/**
	 * @return weight_loss - int(2)
	 */
	public function getweight_loss(){
		return $this->weight_loss;
	}

	/**
	 * @return symptoms_regurg - int(1)
	 */
	public function getsymptoms_regurg(){
		return $this->symptoms_regurg;
	}

	/**
	 * @return symptoms_dysphagia - int(1)
	 */
	public function getsymptoms_dysphagia(){
		return $this->symptoms_dysphagia;
	}

	/**
	 * @return symptoms_chestpain - int(1)
	 */
	public function getsymptoms_chestpain(){
		return $this->symptoms_chestpain;
	}

	/**
	 * @return symptoms_heartburn - int(1)
	 */
	public function getsymptoms_heartburn(){
		return $this->symptoms_heartburn;
	}

	/**
	 * @return symptoms_other - varchar(10)
	 */
	public function getsymptoms_other(){
		return $this->symptoms_other;
	}

	/**
	 * @return Eckart_prior - int(2)
	 */
	public function getEckart_prior(){
		return $this->Eckart_prior;
	}

	/**
	 * @return prev_hrm - int(1)
	 */
	public function getprev_hrm(){
		return $this->prev_hrm;
	}

	/**
	 * @return prev_hrm_rp - decimal(4,1)
	 */
	public function getprev_hrm_rp(){
		return $this->prev_hrm_rp;
	}

	/**
	 * @return prev_hrm_relaxLES - decimal(4,1)
	 */
	public function getprev_hrm_relaxLES(){
		return $this->prev_hrm_relaxLES;
	}

	/**
	 * @return prev_hrm_UES - int(1)
	 */
	public function getprev_hrm_UES(){
		return $this->prev_hrm_UES;
	}

	/**
	 * @return prev_hrm_diagnosis - int(1)
	 */
	public function getprev_hrm_diagnosis(){
		return $this->prev_hrm_diagnosis;
	}

	/**
	 * @return barium_swallow_date - varchar(10)
	 */
	public function getbarium_swallow_date(){
		return $this->barium_swallow_date;
	}

	/**
	 * @return barium_swallow_result - int(1)
	 */
	public function getbarium_swallow_result(){
		return $this->barium_swallow_result;
	}

	/**
	 * @return gastroscopy_prev - int(1)
	 */
	public function getgastroscopy_prev(){
		return $this->gastroscopy_prev;
	}

	/**
	 * @return POEM_duration_total - int(3)
	 */
	public function getPOEM_duration_total(){
		return $this->POEM_duration_total;
	}

	/**
	 * @return POEM_duration_tunnel - int(3)
	 */
	public function getPOEM_duration_tunnel(){
		return $this->POEM_duration_tunnel;
	}

	/**
	 * @return POEM_GOJ_distance - int(2)
	 */
	public function getPOEM_GOJ_distance(){
		return $this->POEM_GOJ_distance;
	}

	/**
	 * @return POEM_incision_distance - int(2)
	 */
	public function getPOEM_incision_distance(){
		return $this->POEM_incision_distance;
	}

	/**
	 * @return POEM_incision_position - int(2)
	 */
	public function getPOEM_incision_position(){
		return $this->POEM_incision_position;
	}

	/**
	 * @return POEM_myotomy_length - int(2)
	 */
	public function getPOEM_myotomy_length(){
		return $this->POEM_myotomy_length;
	}

	/**
	 * @return POEM_perforation - int(1)
	 */
	public function getPOEM_perforation(){
		return $this->POEM_perforation;
	}

	/**
	 * @return POEM_IPB - int(1)
	 */
	public function getPOEM_IPB(){
		return $this->POEM_IPB;
	}

	/**
	 * @return POEM_current - int(1)
	 */
	public function getPOEM_current(){
		return $this->POEM_current;
	}

	/**
	 * @return POEM_number_clips - int(1)
	 */
	public function getPOEM_number_clips(){
		return $this->POEM_number_clips;
	}

	/**
	 * @return POEM_glucagon - int(1)
	 */
	public function getPOEM_glucagon(){
		return $this->POEM_glucagon;
	}

	/**
	 * @return POEM_buscopan - int(2)
	 */
	public function getPOEM_buscopan(){
		return $this->POEM_buscopan;
	}

	/**
	 * @return POEM_antibiotics - int(1)
	 */
	public function getPOEM_antibiotics(){
		return $this->POEM_antibiotics;
	}

	/**
	 * @return POEM_complication - int(1)
	 */
	public function getPOEM_complication(){
		return $this->POEM_complication;
	}

	/**
	 * @return POEM_complication_type - int(1)
	 */
	public function getPOEM_complication_type(){
		return $this->POEM_complication_type;
	}

	/**
	 * @return POEM_admission_days - int(1)
	 */
	public function getPOEM_admission_days(){
		return $this->POEM_admission_days;
	}

	/**
	 * @return post_symptoms - int(1)
	 */
	public function getpost_symptoms(){
		return $this->post_symptoms;
	}

	/**
	 * @return post_Eckart - int(1)
	 */
	public function getpost_Eckart(){
		return $this->post_Eckart;
	}

	/**
	 * @return post_HRM_resting - int(3)
	 */
	public function getpost_HRM_resting(){
		return $this->post_HRM_resting;
	}

	/**
	 * @return post_HRM_GOJ - int(2)
	 */
	public function getpost_HRM_GOJ(){
		return $this->post_HRM_GOJ;
	}

	/**
	 * @return _k_patient - int(2)
	 */
	public function get_k_patient(){
		return $this->_k_patient;
	}

	/**
	 * @return post_HRM_relaxLOS - int(3)
	 */
	public function getpost_HRM_relaxLOS(){
		return $this->post_HRM_relaxLOS;
	}

	/**
	 * @return post_HRM_UESnormal - int(1)
	 */
	public function getpost_HRM_UESnormal(){
		return $this->post_HRM_UESnormal;
	}

	/**
	 * @return post_HRM_diagnosis - int(1)
	 */
	public function getpost_HRM_diagnosis(){
		return $this->post_HRM_diagnosis;
	}

	/**
	 * @return post_bariumswallow_date - varchar(10)
	 */
	public function getpost_bariumswallow_date(){
		return $this->post_bariumswallow_date;
	}

	/**
	 * @return post_bariumswallow_diagnosis - varchar(10)
	 */
	public function getpost_bariumswallow_diagnosis(){
		return $this->post_bariumswallow_diagnosis;
	}

	/**
	 * @return post_gastroscopy - int(8)
	 */
	public function getpost_gastroscopy(){
		return $this->post_gastroscopy;
	}

	/**
	 * @return post_gastroscopy_result - int(1)
	 */
	public function getpost_gastroscopy_result(){
		return $this->post_gastroscopy_result;
	}

	/**
	 * @return post_datecollected - varchar(10)
	 */
	public function getpost_datecollected(){
		return $this->post_datecollected;
	}

	/**
	 * @return current_weight - varchar(10)
	 */
	public function getcurrent_weight(){
		return $this->current_weight;
	}

	/**
	 * @return diagnosis - int(1)
	 */
	public function getdiagnosis(){
		return $this->diagnosis;
	}

	/**
	 * @return barium_swallow_done - int(1)
	 */
	public function getbarium_swallow_done(){
		return $this->barium_swallow_done;
	}

	/**
	 * @return ComplicationDetails - varchar(91)
	 */
	public function getComplicationDetails(){
		return $this->ComplicationDetails;
	}

	/**
	 * @return ProcedureDate - varchar(10)
	 */
	public function getProcedureDate(){
		return $this->ProcedureDate;
	}

	/**
	 * @return CompleteFUCheck - int(1)
	 */
	public function getCompleteFUCheck(){
		return $this->CompleteFUCheck;
	}

	/**
	 * @return Referrer - varchar(20)
	 */
	public function getReferrer(){
		return $this->Referrer;
	}

	/**
	 * @return ReferrerFax - decimal(10,9)
	 */
	public function getReferrerFax(){
		return $this->ReferrerFax;
	}

	/**
	 * @return ReferrerEmail - varchar(10)
	 */
	public function getReferrerEmail(){
		return $this->ReferrerEmail;
	}

	/**
	 * @return Firstname - varchar(9)
	 */
	public function getFirstname(){
		return $this->Firstname;
	}

	/**
	 * @return Surname - varchar(10)
	 */
	public function getSurname(){
		return $this->Surname;
	}

	/**
	 * @return IPSubcutEmphysema - int(1)
	 */
	public function getIPSubcutEmphysema(){
		return $this->IPSubcutEmphysema;
	}

	/**
	 * @return IPSubcutEmphysemaMx - int(1)
	 */
	public function getIPSubcutEmphysemaMx(){
		return $this->IPSubcutEmphysemaMx;
	}

	/**
	 * @return gastroscopy_prevdilated - int(1)
	 */
	public function getgastroscopy_prevdilated(){
		return $this->gastroscopy_prevdilated;
	}

	/**
	 * @return gastroscopy_prevresistance - int(1)
	 */
	public function getgastroscopy_prevresistance(){
		return $this->gastroscopy_prevresistance;
	}

	/**
	 * @return gastroscopy_prevopenCOJ - int(1)
	 */
	public function getgastroscopy_prevopenCOJ(){
		return $this->gastroscopy_prevopenCOJ;
	}

	/**
	 * @return gastroscopy_prevspasm - int(1)
	 */
	public function getgastroscopy_prevspasm(){
		return $this->gastroscopy_prevspasm;
	}

	/**
	 * @return gastroscopy_prevother - varchar(33)
	 */
	public function getgastroscopy_prevother(){
		return $this->gastroscopy_prevother;
	}

	/**
	 * @return post_Eckart_dysphagia - varchar(10)
	 */
	public function getpost_Eckart_dysphagia(){
		return $this->post_Eckart_dysphagia;
	}

	/**
	 * @return post_Eckart_regurgitation - varchar(10)
	 */
	public function getpost_Eckart_regurgitation(){
		return $this->post_Eckart_regurgitation;
	}

	/**
	 * @return post_Eckart_pain - varchar(10)
	 */
	public function getpost_Eckart_pain(){
		return $this->post_Eckart_pain;
	}

	/**
	 * @return post_Eckart_wtloss - varchar(10)
	 */
	public function getpost_Eckart_wtloss(){
		return $this->post_Eckart_wtloss;
	}

	/**
	 * @return pre_Eckart_dysphagia - varchar(10)
	 */
	public function getpre_Eckart_dysphagia(){
		return $this->pre_Eckart_dysphagia;
	}

	/**
	 * @return pre_Eckart_regurgitation - varchar(10)
	 */
	public function getpre_Eckart_regurgitation(){
		return $this->pre_Eckart_regurgitation;
	}

	/**
	 * @return pre_Eckart_wtloss - varchar(10)
	 */
	public function getpre_Eckart_wtloss(){
		return $this->pre_Eckart_wtloss;
	}

	/**
	 * @return pre_Eckart_pain - varchar(10)
	 */
	public function getpre_Eckart_pain(){
		return $this->pre_Eckart_pain;
	}

	/**
	 * @param Type: int(11)
	 */
	public function setid($id){
		$this->id = $id;
	}

	/**
	 * @param Type: int(8)
	 */
	public function setMRN($MRN){
		$this->MRN = $MRN;
	}

	/**
	 * @param Type: varchar(10)
	 */
	public function setDOB($DOB){
		$this->DOB = $DOB;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setcomorbidity($comorbidity){
		$this->comorbidity = $comorbidity;
	}

	/**
	 * @param Type: varchar(35)
	 */
	public function setcomorbidity_other($comorbidity_other){
		$this->comorbidity_other = $comorbidity_other;
	}

	/**
	 * @param Type: decimal(4,1)
	 */
	public function setweight($weight){
		$this->weight = $weight;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setmedication_aspirin($medication_aspirin){
		$this->medication_aspirin = $medication_aspirin;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setmedication_clopidogrel($medication_clopidogrel){
		$this->medication_clopidogrel = $medication_clopidogrel;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setmedication_warfarin($medication_warfarin){
		$this->medication_warfarin = $medication_warfarin;
	}

	/**
	 * @param Type: varchar(27)
	 */
	public function setmedication_other($medication_other){
		$this->medication_other = $medication_other;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setprevious_treatment_PPI($previous_treatment_PPI){
		$this->previous_treatment_PPI = $previous_treatment_PPI;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setprevious_treatment_CACB($previous_treatment_CACB){
		$this->previous_treatment_CACB = $previous_treatment_CACB;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setprevious_treatment_NITR($previous_treatment_NITR){
		$this->previous_treatment_NITR = $previous_treatment_NITR;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setprevious_treatment_SSRI($previous_treatment_SSRI){
		$this->previous_treatment_SSRI = $previous_treatment_SSRI;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setprevious_treatment_Dilatation($previous_treatment_Dilatation){
		$this->previous_treatment_Dilatation = $previous_treatment_Dilatation;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setprevious_treatment_botulinum($previous_treatment_botulinum){
		$this->previous_treatment_botulinum = $previous_treatment_botulinum;
	}

	/**
	 * @param Type: int(2)
	 */
	public function setweight_loss($weight_loss){
		$this->weight_loss = $weight_loss;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setsymptoms_regurg($symptoms_regurg){
		$this->symptoms_regurg = $symptoms_regurg;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setsymptoms_dysphagia($symptoms_dysphagia){
		$this->symptoms_dysphagia = $symptoms_dysphagia;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setsymptoms_chestpain($symptoms_chestpain){
		$this->symptoms_chestpain = $symptoms_chestpain;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setsymptoms_heartburn($symptoms_heartburn){
		$this->symptoms_heartburn = $symptoms_heartburn;
	}

	/**
	 * @param Type: varchar(10)
	 */
	public function setsymptoms_other($symptoms_other){
		$this->symptoms_other = $symptoms_other;
	}

	/**
	 * @param Type: int(2)
	 */
	public function setEckart_prior($Eckart_prior){
		$this->Eckart_prior = $Eckart_prior;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setprev_hrm($prev_hrm){
		$this->prev_hrm = $prev_hrm;
	}

	/**
	 * @param Type: decimal(4,1)
	 */
	public function setprev_hrm_rp($prev_hrm_rp){
		$this->prev_hrm_rp = $prev_hrm_rp;
	}

	/**
	 * @param Type: decimal(4,1)
	 */
	public function setprev_hrm_relaxLES($prev_hrm_relaxLES){
		$this->prev_hrm_relaxLES = $prev_hrm_relaxLES;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setprev_hrm_UES($prev_hrm_UES){
		$this->prev_hrm_UES = $prev_hrm_UES;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setprev_hrm_diagnosis($prev_hrm_diagnosis){
		$this->prev_hrm_diagnosis = $prev_hrm_diagnosis;
	}

	/**
	 * @param Type: varchar(10)
	 */
	public function setbarium_swallow_date($barium_swallow_date){
		$this->barium_swallow_date = $barium_swallow_date;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setbarium_swallow_result($barium_swallow_result){
		$this->barium_swallow_result = $barium_swallow_result;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setgastroscopy_prev($gastroscopy_prev){
		$this->gastroscopy_prev = $gastroscopy_prev;
	}

	/**
	 * @param Type: int(3)
	 */
	public function setPOEM_duration_total($POEM_duration_total){
		$this->POEM_duration_total = $POEM_duration_total;
	}

	/**
	 * @param Type: int(3)
	 */
	public function setPOEM_duration_tunnel($POEM_duration_tunnel){
		$this->POEM_duration_tunnel = $POEM_duration_tunnel;
	}

	/**
	 * @param Type: int(2)
	 */
	public function setPOEM_GOJ_distance($POEM_GOJ_distance){
		$this->POEM_GOJ_distance = $POEM_GOJ_distance;
	}

	/**
	 * @param Type: int(2)
	 */
	public function setPOEM_incision_distance($POEM_incision_distance){
		$this->POEM_incision_distance = $POEM_incision_distance;
	}

	/**
	 * @param Type: int(2)
	 */
	public function setPOEM_incision_position($POEM_incision_position){
		$this->POEM_incision_position = $POEM_incision_position;
	}

	/**
	 * @param Type: int(2)
	 */
	public function setPOEM_myotomy_length($POEM_myotomy_length){
		$this->POEM_myotomy_length = $POEM_myotomy_length;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setPOEM_perforation($POEM_perforation){
		$this->POEM_perforation = $POEM_perforation;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setPOEM_IPB($POEM_IPB){
		$this->POEM_IPB = $POEM_IPB;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setPOEM_current($POEM_current){
		$this->POEM_current = $POEM_current;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setPOEM_number_clips($POEM_number_clips){
		$this->POEM_number_clips = $POEM_number_clips;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setPOEM_glucagon($POEM_glucagon){
		$this->POEM_glucagon = $POEM_glucagon;
	}

	/**
	 * @param Type: int(2)
	 */
	public function setPOEM_buscopan($POEM_buscopan){
		$this->POEM_buscopan = $POEM_buscopan;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setPOEM_antibiotics($POEM_antibiotics){
		$this->POEM_antibiotics = $POEM_antibiotics;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setPOEM_complication($POEM_complication){
		$this->POEM_complication = $POEM_complication;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setPOEM_complication_type($POEM_complication_type){
		$this->POEM_complication_type = $POEM_complication_type;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setPOEM_admission_days($POEM_admission_days){
		$this->POEM_admission_days = $POEM_admission_days;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setpost_symptoms($post_symptoms){
		$this->post_symptoms = $post_symptoms;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setpost_Eckart($post_Eckart){
		$this->post_Eckart = $post_Eckart;
	}

	/**
	 * @param Type: int(3)
	 */
	public function setpost_HRM_resting($post_HRM_resting){
		$this->post_HRM_resting = $post_HRM_resting;
	}

	/**
	 * @param Type: int(2)
	 */
	public function setpost_HRM_GOJ($post_HRM_GOJ){
		$this->post_HRM_GOJ = $post_HRM_GOJ;
	}

	/**
	 * @param Type: int(2)
	 */
	public function set_k_patient($_k_patient){
		$this->_k_patient = $_k_patient;
	}

	/**
	 * @param Type: int(3)
	 */
	public function setpost_HRM_relaxLOS($post_HRM_relaxLOS){
		$this->post_HRM_relaxLOS = $post_HRM_relaxLOS;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setpost_HRM_UESnormal($post_HRM_UESnormal){
		$this->post_HRM_UESnormal = $post_HRM_UESnormal;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setpost_HRM_diagnosis($post_HRM_diagnosis){
		$this->post_HRM_diagnosis = $post_HRM_diagnosis;
	}

	/**
	 * @param Type: varchar(10)
	 */
	public function setpost_bariumswallow_date($post_bariumswallow_date){
		$this->post_bariumswallow_date = $post_bariumswallow_date;
	}

	/**
	 * @param Type: varchar(10)
	 */
	public function setpost_bariumswallow_diagnosis($post_bariumswallow_diagnosis){
		$this->post_bariumswallow_diagnosis = $post_bariumswallow_diagnosis;
	}

	/**
	 * @param Type: int(8)
	 */
	public function setpost_gastroscopy($post_gastroscopy){
		$this->post_gastroscopy = $post_gastroscopy;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setpost_gastroscopy_result($post_gastroscopy_result){
		$this->post_gastroscopy_result = $post_gastroscopy_result;
	}

	/**
	 * @param Type: varchar(10)
	 */
	public function setpost_datecollected($post_datecollected){
		$this->post_datecollected = $post_datecollected;
	}

	/**
	 * @param Type: varchar(10)
	 */
	public function setcurrent_weight($current_weight){
		$this->current_weight = $current_weight;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setdiagnosis($diagnosis){
		$this->diagnosis = $diagnosis;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setbarium_swallow_done($barium_swallow_done){
		$this->barium_swallow_done = $barium_swallow_done;
	}

	/**
	 * @param Type: varchar(91)
	 */
	public function setComplicationDetails($ComplicationDetails){
		$this->ComplicationDetails = $ComplicationDetails;
	}

	/**
	 * @param Type: varchar(10)
	 */
	public function setProcedureDate($ProcedureDate){
		$this->ProcedureDate = $ProcedureDate;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setCompleteFUCheck($CompleteFUCheck){
		$this->CompleteFUCheck = $CompleteFUCheck;
	}

	/**
	 * @param Type: varchar(20)
	 */
	public function setReferrer($Referrer){
		$this->Referrer = $Referrer;
	}

	/**
	 * @param Type: decimal(10,9)
	 */
	public function setReferrerFax($ReferrerFax){
		$this->ReferrerFax = $ReferrerFax;
	}

	/**
	 * @param Type: varchar(10)
	 */
	public function setReferrerEmail($ReferrerEmail){
		$this->ReferrerEmail = $ReferrerEmail;
	}

	/**
	 * @param Type: varchar(9)
	 */
	public function setFirstname($Firstname){
		$this->Firstname = $Firstname;
	}

	/**
	 * @param Type: varchar(10)
	 */
	public function setSurname($Surname){
		$this->Surname = $Surname;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setIPSubcutEmphysema($IPSubcutEmphysema){
		$this->IPSubcutEmphysema = $IPSubcutEmphysema;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setIPSubcutEmphysemaMx($IPSubcutEmphysemaMx){
		$this->IPSubcutEmphysemaMx = $IPSubcutEmphysemaMx;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setgastroscopy_prevdilated($gastroscopy_prevdilated){
		$this->gastroscopy_prevdilated = $gastroscopy_prevdilated;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setgastroscopy_prevresistance($gastroscopy_prevresistance){
		$this->gastroscopy_prevresistance = $gastroscopy_prevresistance;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setgastroscopy_prevopenCOJ($gastroscopy_prevopenCOJ){
		$this->gastroscopy_prevopenCOJ = $gastroscopy_prevopenCOJ;
	}

	/**
	 * @param Type: int(1)
	 */
	public function setgastroscopy_prevspasm($gastroscopy_prevspasm){
		$this->gastroscopy_prevspasm = $gastroscopy_prevspasm;
	}

	/**
	 * @param Type: varchar(33)
	 */
	public function setgastroscopy_prevother($gastroscopy_prevother){
		$this->gastroscopy_prevother = $gastroscopy_prevother;
	}

	/**
	 * @param Type: varchar(10)
	 */
	public function setpost_Eckart_dysphagia($post_Eckart_dysphagia){
		$this->post_Eckart_dysphagia = $post_Eckart_dysphagia;
	}

	/**
	 * @param Type: varchar(10)
	 */
	public function setpost_Eckart_regurgitation($post_Eckart_regurgitation){
		$this->post_Eckart_regurgitation = $post_Eckart_regurgitation;
	}

	/**
	 * @param Type: varchar(10)
	 */
	public function setpost_Eckart_pain($post_Eckart_pain){
		$this->post_Eckart_pain = $post_Eckart_pain;
	}

	/**
	 * @param Type: varchar(10)
	 */
	public function setpost_Eckart_wtloss($post_Eckart_wtloss){
		$this->post_Eckart_wtloss = $post_Eckart_wtloss;
	}

	/**
	 * @param Type: varchar(10)
	 */
	public function setpre_Eckart_dysphagia($pre_Eckart_dysphagia){
		$this->pre_Eckart_dysphagia = $pre_Eckart_dysphagia;
	}

	/**
	 * @param Type: varchar(10)
	 */
	public function setpre_Eckart_regurgitation($pre_Eckart_regurgitation){
		$this->pre_Eckart_regurgitation = $pre_Eckart_regurgitation;
	}

	/**
	 * @param Type: varchar(10)
	 */
	public function setpre_Eckart_wtloss($pre_Eckart_wtloss){
		$this->pre_Eckart_wtloss = $pre_Eckart_wtloss;
	}

	/**
	 * @param Type: varchar(10)
	 */
	public function setpre_Eckart_pain($pre_Eckart_pain){
		$this->pre_Eckart_pain = $pre_Eckart_pain;
	}

    /**
     * Close mysql connection
     */
	public function endPOEM(){
		$this->connection->CloseMysql();
	}

}