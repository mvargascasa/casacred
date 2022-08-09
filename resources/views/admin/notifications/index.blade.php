@extends('layouts.dashtw')

@section('firstscript')
<title>Notificaciones</title>
@livewireStyles
@endsection

@section('content')

<main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
    {{-- <table class="table w-full">
        <thead>
          <tr>
            <th class="px-4 py-2">Descripcion</th>
            <th class="px-4 py-2">Comentario</th>
            <th class="px-4 py-2">Fecha</th>
            <th class="px-4 py-2">Accion</th>
          </tr>
        </thead>
        <tbody> --}}
            @foreach ($comments as $comment)
            <div onclick="setviewed({{$comment->comment_id}}, {{$comment->listing_id}})" style="cursor: pointer">
                <div class="w-full border p-4 m-2 inline-block @if(!$comment->viewed) bg-gray-300 @endif">
                    <label class="text-gray-500">{{ date_format($comment->created_at, "Y/m/d")}}</label>
                    <div class="flex">
                        @if(!$comment->viewed)<div class="bg-red-600 text-white rounded mr-2" style="padding-left: 1px; padding-right: 1px">new</div>@endif
                        <p>La propiedad con código <b class="text-black">{{ $comment->property_code }}</b> ha cambiado de precio. Precio anterior: <b>${{ number_format($comment->property_price_prev)}}</b>. Precio actual: <b>${{number_format($comment->property_price)}}</b></p>
                    </div>
                    <p><b>Comentario:</b> {{$comment->comment}}</p>
                    {{-- <a href="{{ url('admin/tw/edit/'.$comment->listing_id) }}" class="float-right bg-green-500 mx-4 p-1 rounded text-white">Ver propiedad</a>         --}}
                    {{-- <button class="float-right bg-yellow-400 p-1 rounded">Ver comentario</button> --}}
                </div>
            </div>
                {{-- <tr>
                <td class="border px-4 py-2 flex">
                    @if ($comment->viewed == false)
                        <div style="background-color: red; color: white" class="pl-2 pr-2 rounded mr-2">new</div>
                    @endif
                    El precio de la propiedad {{ $comment->property_code }} ha cambiado de {{ $comment->property_price_prev}} a {{$comment->property_price}}.
                </td>
                <td class="border px-4 py-2">{{$comment->comment}}</td>
                <td class="border px-4 py-2 text-center">{{date_format($comment->created_at, "Y/m/d")}}</td>
                <td class="border px-4 py-2 text-center">
                    <a href="{{ route('home.tw.show', $comment->listing_id) }}">Ver propiedad</a>
                </td>
                </tr> --}}
            @endforeach
        {{-- </tbody>
      </table> --}}
      {{ $comments->links('pagination::tailwind')}}
</main>
    
@endsection

@section('endscript')
<script>
    function setviewed(id, listingid){
        console.log(id);
        $.ajax({
        url: "{{route('admin.comment.setviewed')}}",
        type: "POST",
        data: {
            "_token": "{{ csrf_token() }}",
            "id": id,
        },
        dataType: "json",
        success: function(response){
            window.location.assign("https://casacredito.com/admin/tw/edit/"+listingid);
        },
        error: function(error){
    
        }
        }  );
    }

</script>
@endsection