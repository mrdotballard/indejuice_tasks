<?php

    /* 
     *  Function    : generateSentence()
     * 
     *  Description : Generate a sentence listing out all items provided in an array.
     *  
     *  Parameters  : (string)               start         - The start of the sentence
     *                (array[string])        items         - The list of items
     *                (string/array[string]) append        - (optional) item types to be appended to each item
     * 
     *  Return      : string
     * 
     *  Example     : See run.php for input/output examples
     *  
     *  Test        : Execute run.php to test your implementation.
     *                (In console, simply run the command 'php run.php')
     * 
     */

    
    function generateSentence($start, ...$params) {
      $finalSentence = $start . ': ';
      
      // 1. If no optional param exists
      if(!isset($params[1])) {
        return buildSentence($finalSentence, $params[0]);
      } 

      // 2. If optional param is a string or array, map over item array (params[0]) concatenating type(s) (params[1])
      else if(gettype($params[1]) === 'string') {
        $type = ' ' . $params[1]; //string - make available for callback
        $newItemsArray = array_map(function ($item) use ($type) {
          return $item . $type;
        }, $params[0]);
        return buildSentence($finalSentence, $newItemsArray);
      } 

      else if(gettype($params[1]) === 'array') {
        $types = $params[1]; //array - make available for callback
        $newItemsArray = array_map(function ($item, $type) {
          return "$item $type";
        }, $params[0], $params[1]);
        return buildSentence($finalSentence, $newItemsArray);
      }
    }

   
    /**
     * Function     : buildSentence()
     * 
     * Description  : Concatenate final sentence string together.
     * 
     * Parameters   : (string)    finalSentence   - string to be built upon and returned
     *                (array)     items           - list of items (with possible options already concatenated)
     * 
     * Return       : string
     */
    function buildSentence($finalSentence, $items) {
      for($i = 0; $i < count($items); $i++) {
        if($i === count($items) - 2) {
          $finalSentence .= $items[$i] . ' and ' . $items[$i+1] . '.';
          break;
        }
        $finalSentence .=  $items[$i] . ', ';
      }

      return $finalSentence;
    }



    /**
     * Before refactor
     */
    /*
    function noOptionBuild($finalSentence, $items) {
      for($i = 0; $i < count($items); $i++) {
        if($i === count($items) - 2) {
          $finalSentence .= $items[$i] . ' and ' . $items[$i+1] . '.';
          break;
        }
        $finalSentence .=  $items[$i] . ', ';
      }
      echo $finalSentence;
      return $finalSentence;
    }

    function singleTypeBuild($finalSentence, $items, $type) {
      for($i = 0; $i < count($items); $i++) {
        if($i === count($items) - 2) {
          $finalSentence .= $items[$i] . ' ' . $type . ' and ' . $items[$i+1] . ' ' . $type . '.';
          break;
        }
        $finalSentence .=  $items[$i] . ' ' . $type . ', ';
      }
      echo $finalSentence;
      return $finalSentence;
    }

    function multiTypeBuild($finalSentence, $items, $types) {
      for($i = 0; $i < count($items); $i++) {
        if($i === count($items) - 2) {
          $finalSentence .= $items[$i] . ' ' . $types[$i] . ' and ' . $items[$i+1] . ' ' . $types[$i+1] . '.';
          break;
        }
        $finalSentence .=  $items[$i] . ' ' . $types[$i] . ', ';
      }
      echo $finalSentence;
      return $finalSentence;
    }
    */