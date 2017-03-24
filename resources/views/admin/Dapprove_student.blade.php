@extends('layouts.app')
@section('title')

login
@endsection
@section('header')
<style>
	select{
		margin-left: 3px;
	}
	#but{
		margin-top: 32px;
		margin-left: 20px
	}
</style>
@endsection

@section('content')

			
   
<h3 class="center">This student : {{@$name_stu[0]->First}} {{$name_stu[0]->Middle}} {{$name_stu[0]->Last}} willn't join to school</h3>     
           
@endsection
@section('footer')
@endsection