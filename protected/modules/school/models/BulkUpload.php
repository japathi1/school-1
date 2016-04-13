<?php

	Class BulkUpload extends CFormModel {

		public $class;
	    public $section;
	    public $excelFile;

	    /**
	     * Declares the validation rules.
	     * The rules state that username and password are required,
	     * and password needs to be authenticated.
	     */
	    public function rules() {
	        return array(
	            // username and password are required
	            array('class, section, excelFile', 'required'),
	            array('excelFile', 'file', 'types'=>'xls', 'safe' => true),
	            
	        );
	    }

	    /**
	     * Declares attribute labels.
	     */
	    public function attributeLabels() {
	        return array(
	            'class' => "Class",
	            'section' => "Section",
	            'excelFile' => "Excel File",
	        );
	    }

	}

?>