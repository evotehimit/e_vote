<!DOCTYPE html>
<html>
<head>
{!! HTML::script('js/jquery-2.1.3.min.js') !!}
{!! HTML::style('css/style.css') !!}
{!! HTML::style('css/bootstrap.css') !!}
{!! HTML::script('js/bootstrap.js') !!}
	@yield('head')
<script type="text/javascript">
    <?php date_default_timezone_set('Asia/Jakarta'); ?>
    var serverTime = new Date(<?php print date('Y, m, d, H, i, s, 0'); ?>);
    var clientTime = new Date();
    var Diff = serverTime.getTime() - clientTime.getTime();    
    function displayServerTime(){
        var clientTime = new Date();
        var time = new Date(clientTime.getTime() + Diff);
        var sh = time.getHours().toString();
        var sm = time.getMinutes().toString();
        var ss = time.getSeconds().toString();
        document.getElementById("clock").innerHTML = (sh.length==1?"0"+sh:sh) + ":" + (sm.length==1?"0"+sm:sm) + ":" + (ss.length==1?"0"+ss:ss);
    }
</script>
</head>
<body onload="setInterval('displayServerTime()', 1000);">
<div>
	
		<div class="header">
			  <div class="panel-body">
			  	<div class="kiri">
			  		<img alt="E-vote" class="img-responsive" width="120" height="120" src="images/E-VotePutih.png"/>
			  	</div>
			    <div class="tengah">
			    	<h4><span>{{ date('d F Y, ') }}</span>
			    	<span id="clock">{{ date('H:i:s') }}</span></h4>
			    </div>
			    <div class="kanan">
			    	@if($hak_akses==0)
			    		Administrator <a href="logout">Logout</a></div>
			    	@elseif($hak_akses==1)
			    		Operator
			    	@elseif($hak_akses==2)
			    		Observer 
			    	@elseif($hak_akses==3)
			    		<div>Candidate ( {{$data->username}} ) <a href="logout">Logout</a></div>
			    	@else
			    	<h4>	Welcome to E-vote, Guest</h4>
			    	@endif
			    </div>
			  </div>
		</div>
	
	<div class="body">@yield('body')</div>
	<div class="panel panel-default" style="text-align:center;height:35px;">
		<div class="panel-body footer">© E-VOTE | SUKSESI HIMIT PENS 2015</div>
	</div>
</div>
</body>
</html>
