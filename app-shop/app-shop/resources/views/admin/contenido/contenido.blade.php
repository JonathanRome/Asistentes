@extends('admin.admin')
@section('content')
       <template v-if="menu==0"> 
            <statistics-component></statistics-component>
       </template>
       <template v-if="menu==1"> 
         <chat-component></chat-component>
         
      </template>
      <template v-if="menu==2" > 
            <categories-component></categories-component>
    </template>
    <template v-if="menu==3" > 
      <editoriales-component></editoriales-component>
</template>
    

@endsection
{{-- <template v-if="menu==1"> 
        @section('css')
            <link href="{{asset('css/chat.css')}}" rel="stylesheet">
         @endsection
</template> --}}