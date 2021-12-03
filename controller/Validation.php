<?php
    class validate{
        
        public function string($input){

             if(is_nan($input)){
                 trim($input);
                 filter_var($input, FILTER_SANITIZE_STRING);
                 return $input;
             }
             else{
                 return false;
             }
        }

        public function email($email){

            if(is_nan($email)){
                trim($email);
                filter_var($email, FILTER_SANITIZE_EMAIL);
                return $email;
            }
            else{
                return false;
            }
        }

        public function is_int($number){
            return(is_int($number) ? $number : false);
        }

    }