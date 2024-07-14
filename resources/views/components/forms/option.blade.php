@props(['value', 'ofSelect', 'class' => '', 'dataType' => ''])

<option class="{{ $class }}" value="{{ $value }}" data-type="{{ $dataType }}" {{ old("$ofSelect") === "$value" ? 'selected' : '' }}>{{ ucwords($value) }}</option>