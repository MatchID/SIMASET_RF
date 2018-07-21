<?php

    class ClassDocx
    {
        public $ftemplate;      // file yang di jadikan template laporan
        public $freport;        // generate file yang akan mejadi laporan
         
        private $documentxml;   // dokumen xml dalam docx
        private $headerxml;     // header docx
        private $zip; //variable zip
         
         
    /**
     * ftemplate: file template
     * freport  : file report
     */
        function __construct($ftemplate,$freport="")
        {
            $this->ftemplate=$ftemplate;     
            //$this->freport=($freport="")?$ftemplate:$freport;
             
            if($freport=="")
            {
                $this->freport=$ftemplate;
            }
            else
            {
                copy($ftemplate,$freport);
                $this->freport=$freport;
            }
             
             
            //liat zip nya
            $this->zip = new ZipArchive;
            $this->zip->open($this->freport, ZipArchive::CREATE);
             
             
            //baca documentxml
            $fp=$this->zip->getStream("word/document.xml");
            if(!$fp) exit("failed\n document.xml ");    
            while (!feof($fp)) {
                $this->documentxml .= fread($fp, 2);
            } 
            fclose($fp);
             
            //baca header
            $fp=$this->zip->getStream("word/header1.xml");
            if(!$fp) exit("failed header1.xml \n"); 
            while (!feof($fp)) {
                $this->headerxml .= fread($fp, 2);
            } 
            fclose($fp);
     
        }
        /**
         * untuk merubah variable pada xml
         */
        function replace($var,$words)
        {
            $this->documentxml=str_replace($var,$words,$this->documentxml);
            $this->headerxml=str_replace($var,$words,$this->headerxml);
        }
     
        function generate()
        {
             $this->zip->addFromString('word/document.xml', $this->documentxml);       
             $this->zip->addFromString('word/header1.xml', $this->headerxml);       
        }
    }
 
?>