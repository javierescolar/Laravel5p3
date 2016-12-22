<table style="height: 59px;" width="566">
<tbody>
<tr>
<td style="background-color: #333;">
<h1 style="text-align: center;"><span style="color: #ffffff;">Mobile Shopping&nbsp;</span></h1>
</td>
</tr>
<tr>
<td>
<h3>Confirmaci&oacute;n de registro</h3>
<p>Estimad@&nbsp; {{$data['name']}}</p>
<p>Gracias por registrarte en <strong>Mobile Shopping</strong> haz click sobre "Confirmar" para finalizar con el proceso de registro y disfrutar de las ofertas.</p>
<p><a href="{{ URL::to('/') }}/confirm/email/{{ $data['email'] }}/confirm_token/{{ $data['confirm_token'] }}">Confirmar</a></p>
</td>
</tr>
</tbody>
</table>
