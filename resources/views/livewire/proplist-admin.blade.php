<tbody>
    <tr>
        <td colspan="6">
            <div class="d-flex ">
                <div>{{$listings->links()}}</div>
                <div class="p-2">Registros: {{$listings->total()}}</div>
            </div> 
        </td>
    </tr>
    @foreach ($listings as $listing)    
    @php $firstImg = array_filter(explode("|", $listing->images)) @endphp
    <tr>
        <td><img class="rounded" src="{{url('uploads/listing/300',$firstImg[0]??'')}}" width="50" height="50" alt=""></td>
        <td>{{$listing->product_code}} <br><span style="color:darkgray;font-size:11px">{{$listing->created_at->format('dMy')}}</span> </td>
        <td class="text-truncate" style="max-width: 400px">
            <a href="{{route('admin.listingedit',$listing->id)}}" style="color:darkblue">{{$listing->listing_title}} </a><br>
            <small class="text-muted">{{$listing->address}}</small>
        </td>
        <td>@foreach ($types as $type) @if ($type->id==$listing->listingtype) {{$type->type_title}} @endif @endforeach</td>
        <td>{{$listing->listingtypestatus}}</td>
        <td>@if($listing->listing_type==1) GRATIS @else PAGADA @endif</td>
        <td>@if($listing->status==1) <span style="color:darkblue">ACTIVA</span>  @else <span style="color:darkgray">DESACTIVADA</span> @endif</td>
        <td>{{$listing->user->name??'User'}}</td>
    </tr>
@endforeach
<tr>
    <td colspan="6">
        <div class="d-flex ">
            <div>{{$listings->links()}}</div>
            <div class="p-2">Registros: {{$listings->total()}}</div>
        </div> 
    </td>
</tr>
</tbody>
