<?php

    /* 
     *  Function    : containsWord()
     * 
     *  Description : Checks whether a sentence contains a specific word, case insensitive.
     *  
     *  Parameters  : (string) word         - The word to find
     *                (string) sentence     - The sentence to search
     * 
     *  Return      : boolean
     * 
     *  Example     : See run.php for input/output examples
     *  
     *  Test        : Execute run.php to test your implementation.
     *                (In console, simply run the command 'php run.php')
     * 
     */
    
    
    function containsWord($word, $sentence){
      // if $word or $sentence param is blank
      if(strlen($word) === 0 || strlen($sentence) === 0) {
        echo "Supplied word or sentence is blank. Please check your input";
        return false;
      }

      // 1. remove punctuation
      $strippedSentence = str_replace(array('.', ','), array(''), $sentence);
      // 2. explode str into array
      $sentenceArray = explode(" ", $strippedSentence);

      foreach($sentenceArray as $str) {
      // 3. compare binary value of strings
        if(strcasecmp($str, $word) === 0) {
          return true;
        }
      }

      return false;
    }
