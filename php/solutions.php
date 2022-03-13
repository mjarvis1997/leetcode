<?php

class Solutions {
    
    /**
     * Given a signed 32-bit integer x, return x with its digits reversed. 
     * If reversing x causes the value to go outside the signed 32-bit integer range [-2^31, 2^31 - 1], then return 0.
     * https://leetcode.com/problems/reverse-integer
     * 
     * @param Integer $x
     * @return Integer
     */
    function reverseInteger($x) {
        if ($x > 0) {
            $reverseString = strrev((string)$x);
        } else {
            $reverseString = '-' . strrev((string)$x);
        }
        
        $reverseInt = (int)$reverseString;
        if ($reverseInt >= -(2 ** 31) && $reverseInt <= 2 ** 31) { 
            return $reverseInt;
        } else {
            return 0;
        }
    }

    /**
     * You are given two non-empty linked lists representing two non-negative integers. 
     * The digits are stored in reverse order, and each of their nodes contains a single digit. 
     * Add the two numbers and return the sum as a linked list.
     * You may assume the two numbers do not contain any leading zero, except the number 0 itself.
     * https://leetcode.com/problems/add-two-numbers
     * 
     * @param ListNode $l1
     * @param ListNode $l2
     * @return ListNode
     */
    function addTwoNumbers($l1, $l2) 
    {
        $root = new ListNode();
        $curr = $root;
        
        $isL1Done = false;
        $isL2Done = false;
        $carryOver = 0;

        while(1)
        {
            if ($l1 || $l2) {
                $val1 = $l1 ? $l1->val : 0;
                $val2 = $l2 ? $l2->val : 0;
                $sum = $val1 + $val2 + $carryOver;
                
                if($sum < 10) {
                    $curr->val = $sum;
                    $carryOver = 0;
                } else {
                    $curr->val = $sum % 10;
                    $carryOver = 1;
                }
                
                $l1 = $l1->next;
                $l2 = $l2->next;
                if($l1 || $l2) {
                    $curr->next = new ListNode();
                    $curr = $curr->next;
                }  
            } else {
                if($carryOver) {
                    $curr->next = new ListNode(1);
                    return $root;
                } else {
                    return $root;    
                }
            }
        }
    }

    /**
     * Given a string s, find the length of the longest substring without repeating characters.
     * https://leetcode.com/problems/longest-substring-without-repeating-characters
     * 
     * @param String $s
     * @return Integer
     */
    function longestSubstringWithoutRepeatingCharacters($s) {
        $length = strlen($s);
        
        if ($length <= 1) {
            return $length;
        }
        
        $bestString = $currString = $s[0];
        
        for($i = 1; $i < $length; ++$i) 
        {
            $currChar = $s[$i];
            $indexOfRepeatedChar = strpos($currString, $currChar);
            
            if ($indexOfRepeatedChar === false) {
                $currString .= $currChar;
            } else {
                $currString = substr($currString, $indexOfRepeatedChar + 1);
                $currString .= $currChar;
            }
            
            if (strlen($currString) > strlen($bestString)) {
                $bestString = $currString;
            }
        }
        return strlen($bestString);
    }

    /**
     * Given two sorted arrays nums1 and nums2 of size m and n respectively, return the median of the two sorted arrays.
     * The overall run time complexity should be O(log (m+n)).
     * This solution currently has run time complexity of O(m+n)
     * 
     * https://leetcode.com/problems/median-of-two-sorted-arrays
     * 
     * @param Integer[] $nums1
     * @param Integer[] $nums2
     * @return Float
     */
    function findMedianSortedArrays($nums1, $nums2) {
       
        $count1 = count($nums1);        
        $count2 = count($nums2);
        $count = $count1 + $count2;
        $inc1 = $inc2 = 0;
       
        $sortedArray = array();
       
        for($i = 0; $i < $count; ++$i)
        {
            if ($inc1 == $count1 && $inc2 == $count2) {
                break;
            } elseif ($inc1 == $count1) {
                $sortedArray[] = $nums2[$inc2];
                ++$inc2;
                continue;
            } elseif ($inc2 == $count2) {
                $sortedArray[] = $nums1[$inc1];
                ++$inc1;
                continue;
            }

            $isNumOneLessOrEqual = $nums1[$inc1] <= $nums2[$inc2];
            
            if($isNumOneLessOrEqual) {
                $sortedArray[] = $nums1[$inc1];
                ++$inc1;
            } else {
                $sortedArray[] = $nums2[$inc2];
                ++$inc2;
            }
        }
       
        $isOdd = ($count) % 2;
        
        if ($isOdd) {
            return $sortedArray[$count/2];
        } else {
            return ($sortedArray[$count/2] + $sortedArray[($count/2) - 1])/2;
        }
    }
}

?>