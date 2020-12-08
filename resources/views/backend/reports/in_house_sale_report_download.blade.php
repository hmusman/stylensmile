<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inhouse Sale Report</title>
    <meta http-equiv="Content-Type" content="text/html;"/>
    <meta charset="UTF-8">
	<style media="all">
		@font-face {
            font-family: 'Roboto';
            src: url("{{ my_asset('fonts/Roboto-Regular.ttf') }}") format("truetype");
            font-weight: normal;
            font-style: normal;
        }
        *{
            margin: 0;
            padding: 0;
            line-height: 1.3;
            font-family: 'Roboto';
            color: #333542;
        }
		body{
			font-size: .875rem;
		}
		.gry-color *,
		.gry-color{
			color:#878f9c;
		}
		table{
			width: 100%;
		}
		table th{
			font-weight: normal;
		}
		table.padding th{
			padding: .5rem .7rem;
		}
		table.padding td{
			padding: .7rem;
		}
		table.sm-padding td{
			padding: .2rem .7rem;
		}
		.border-bottom td,
		.border-bottom th{
			border-bottom:1px solid #eceff4;
		}

		.border-bottom td{
			border-left:1px solid #eceff4;
			text-align: center;
		}
		.text-left{
			text-align:left;
		}
		.text-right{
			text-align:right;
		}
		.small{
			font-size: .85rem;
		}
		.currency{

		}
	</style>
</head>
<body>
	<div style="margin-left:auto;margin-right:auto;">

		@php
			$generalsetting = \App\GeneralSetting::first();
		@endphp

		<div style="background: #eceff4;padding: 1.5rem;">
			<table>
				<tr>
					<td>
						@if (Auth::user()->user_type == 'seller')
							@if(Auth::user()->shop->logo != null)
								<img loading="lazy"  src="{{ my_asset(Auth::user()->shop->logo) }}" height="40" style="display:inline-block;">
							@else
								<img loading="lazy"  src="{{ static_asset('frontend/images/logo/logo.png') }}" height="40" style="display:inline-block;">
							@endif
						@else
							@if($generalsetting->logo != null)
								<img loading="lazy"  src="{{ my_asset($generalsetting->logo) }}" height="40" style="display:inline-block;">
							@else
								<img loading="lazy"  src="{{ static_asset('frontend/images/logo/logo.png') }}" height="40" style="display:inline-block;">
							@endif
						@endif
					</td>
					<td style="font-size: 2.5rem;" class="text-right strong">{{ translate('Inhouse Sale Report') }}</td>
				</tr>
			</table>
			
		</div>

	    <div style="padding: 1.5rem;">
			<table class="padding text-left small border-bottom">
				<thead>
	                <tr class="gry-color" style="background: #eceff4;">
	                    <th width="35%">{{ translate('Product Name') }}</th>
						<th width="25%">{{ translate('Product Tag') }}</th>
	                    <th width="20%">{{ translate('Product Size') }}</th>
	                    <th width="20%">{{ translate('Num Of Sale') }}</th>
	                </tr>
				</thead>
				<tbody class="strong">
					@php $pro_name =" ";@endphp
                        @foreach ($products as $key => $product)
                            @php $i=0;  $qty = 0;@endphp
                            @foreach ($product->stocks as $key => $row)
                            	@php 
                            		$count = 0;
                            		$count =DB::table('order_details')->where('product_id',$product->id)->where('variation',$row->variant)->count();
                            		$qty+=$count;
                            	@endphp
                                <tr>
                                    <td> @if($pro_name != $product->name && $i==0) {{ $product->getTranslation('name') }} @endif</td>
                                    <td>@if($pro_name != $product->name && $i==0) {{ $product->getTranslation('tags') }} @endif</td>
                                    <td>{{ $row->variant }}</td>
                                    <td style="border-right:1px solid #eceff4;">{{ $count }}</td>
                                </tr>

                                @php $i++; @endphp
                            @endforeach
                            @php $pro_name =$product->name @endphp
                            <tr><td colspan="3" style="text-align: center;font-weight: bold; font-size: 18px;">Total </td> <td style="font-weight: bold; font-size: 18px;border-right:1px solid #eceff4;">{{ $qty }}</td></tr>
                        @endforeach
	            </tbody>
			</table>
		</div>
	</div>
</body>
</html>
