<?php

namespace ns1;

class cl1{
	public function fn1(){
		echo __METHOD__;	
	}
}

function fn1(){
	echo __FUNCTION__;
}

const MYCONST = 1;
