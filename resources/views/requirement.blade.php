@extends('layouts/app')

@section('title')
<link rel="stylesheet" href="{{ asset('css/requirement.css') }}" />

@endsection

@section('content')

<section id="re">
<div class="section-header">
    <h3 class="section-title">選擇使用者需求</h3>
    <span class="section-divider"></span>
    
</div>

<form method="post" action="/require" enctype="multipart/form-data">
	{{ csrf_field() }}
	<table cellspacing="10">
		<tr>
			<td>
				<input type="checkbox" class="styled-checkbox" name="requirement[]" value="see" id="styled-checkbox-1">
				<label for="styled-checkbox-1">生理功能強化＿視覺</label>
			</td>
			<td>
				<input type="checkbox" class="styled-checkbox" name="requirement[]" value="listen" id="styled-checkbox-2">
				<label for="styled-checkbox-2">生理功能強化＿聽覺</label>
			</td>
			<td>
				<input type="checkbox" class="styled-checkbox" name="requirement[]" value="muscle" id="styled-checkbox-3">
				<label for="styled-checkbox-3">生理功能強化＿關節與肌肉</label>
			</td>
		</tr>
		<tr>
			<td>
				<input type="checkbox" class="styled-checkbox" name="requirement[]" value="balance" id="styled-checkbox-4">
				<label for="styled-checkbox-4">生理功能強化＿平衡</label>
			</td>
			<td>
				<input type="checkbox" class="styled-checkbox" name="requirement[]" value="memory" id="styled-checkbox-5">
				<label for="styled-checkbox-5">生理功能強化＿記憶</label>
			</td>
			<td>
				<input type="checkbox" class="styled-checkbox" name="requirement[]" value="sleep" id="styled-checkbox-6">
				<label for="styled-checkbox-6">生理功能強化＿睡眠</label>
			</td>
		</tr>
		<tr>
			<td>
				<input type="checkbox" class="styled-checkbox" name="requirement[]" value="accident" id="styled-checkbox-7">
				<label for="styled-checkbox-7">意外預防與緊急應變</label>
			</td>
			<td>
				<input type="checkbox" class="styled-checkbox" name="requirement[]" value="health" id="styled-checkbox-8">
				<label for="styled-checkbox-8">健康管理</label>
			</td>
			<td>
				<input type="checkbox" class="styled-checkbox" name="requirement[]" value="psy" id="styled-checkbox-9">
				<label for="styled-checkbox-9">心理狀態強化</label>
			</td>
		</tr>
				<tr>
			<td>
				<input type="checkbox" class="styled-checkbox" name="requirement[]" value="caregiver_accident" id="styled-checkbox-7">
				<label for="styled-checkbox-7">照顧者_意外預防與緊急應變</label>
			</td>
			<td>
				<input type="checkbox" class="styled-checkbox" name="requirement[]" value="caregiver_help" id="styled-checkbox-8">
				<label for="styled-checkbox-8">照顧者_照顧活動輔助</label>
			</td>
			<td>
				<input type="checkbox" class="styled-checkbox" name="requirement[]" value="caregiver_psy" id="styled-checkbox-9">
				<label for="styled-checkbox-9">照顧者_心理狀態強化</label>
			</td>
		</tr>
	</table>
	<div class="pic">
		<label>請上傳室內設計圖片</label>
		<input type="file" name="photo" >
	</div>
	
	<div>
		<input type="submit"  value="標準版" name="submit">
		<input type="submit"  value="豪華版" name="submit">
		
	</div>
	
</form>

</section>
@endsection

<p class="section-description"></p>
