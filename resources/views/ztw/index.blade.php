@extends('layouts.dashtw')

@section('firstscript')
    <title>Nuevo Dash</title>
@endsection


@section('content')
<main class="flex-1 overflow-x-hidden overflow-y-auto">
    <div class="container mx-auto px-6 py-2">

<h3 class="text-gray-700 text-3xl font-medium">Dashboard</h3>
@foreach ($opports as $opport)
    {{$opport->id}} <br>
@endforeach
<div>

 
    <select x-cloak id="select" class="hidden">
        <option value="1">Option 2</option>
        <option value="2">Option 3</option>
        <option value="3">Option 4</option>
        <option value="5">Option 5</option>
        <option value="6">Option 6</option>
        <option value="7">Option 7</option>
        <option value="8">Option 8</option>
        <option value="9">Option 9</option>
        <option value="10">Creditos Ecuador</option>
        <option value="11">Doble Nacionalidad</option>
    </select>

<div x-data="dropdown()" x-init="loadOptions()" class="w-full md:w-1/2 flex flex-col items-center mx-auto">
  <form>
      <input name="values" type="hidden" x-bind:value="selectedValues()">
      <div class="inline-block relative w-32">
          <div class="flex flex-col items-center relative">
            <!--Select  -->
              <div x-on:click="open" class="w-full  svelte-1l8159u">
                  <div class="my-2 p-1 flex border border-gray-200 bg-white rounded svelte-1l8159u">
                      <div class="flex flex-auto flex-nowrap overflow-hidden">
                          <template x-for="(option,index) in selected" :key="options[option].value">
                              <span class="flex justify-center whitespace-nowrap items-center m-1 font-medium py-1 px-2 bg-white rounded-full text-teal-700 bg-teal-100 border border-teal-300 ">
                                  <span class="text-xs leading-none max-w-full flex-initial" x-model="options[option]" x-text="options[option].text"></span>                                  
                              </span>
                          </template>
                          <div x-show="selected.length    == 0" class="flex-1">
                              <input placeholder="Select a option" x-bind:value="selectedValues()" class="bg-transparent p-1 px-2 appearance-none outline-none h-full w-full text-gray-800">
                          </div>
                      </div>
                      <div class="text-gray-300 w-8 py-1 pl-2 pr-1 border-l flex items-center border-gray-200 svelte-1l8159u">
                          <button type="button" x-show="isOpen() === true" x-on:click="open" class="cursor-pointer w-6 h-6 text-gray-600 outline-none focus:outline-none">
                              <svg version="1.1" class="fill-current h-4 w-4" viewBox="0 0 20 20">
                                  <path d="M17.418,6.109c0.272-0.268,0.709-0.268,0.979,0s0.271,0.701,0,0.969l-7.908,7.83 c-0.27,0.268-0.707,0.268-0.979,0l-7.908-7.83c-0.27-0.268-0.27-0.701,0-0.969c0.271-0.268,0.709-0.268,0.979,0L10,13.25L17.418,6.109z" />
                              </svg>
                          </button>
                          <button type="button" x-show="isOpen() === false" @click="close" class="cursor-pointer w-6 h-6 text-gray-600 outline-none focus:outline-none">
                              <svg class="fill-current h-4 w-4" viewBox="0 0 20 20">
                                  <path d="M2.582,13.891c-0.272,0.268-0.709,0.268-0.979,0s-0.271-0.701,0-0.969l7.908-7.83  c0.27-0.268,0.707-0.268,0.979,0l7.908,7.83c0.27,0.268,0.27,0.701,0,0.969c-0.271,0.268-0.709,0.268-0.978,0L10,6.75L2.582,13.891z  " />
                              </svg>
                          </button>
                      </div>
                  </div>
              </div> <!--Fin Select  -->

                <!--Desplegable  -->
              <div class="w-full">
                  <div x-show.transition.origin.top="isOpen()" x-on:click.away="close" class="absolute shadow top-100 bg-white z-40 w-full lef-0 rounded max-h-select overflow-y-auto svelte-5uyqqj">
                      <div class="flex flex-col w-full">
                          <template x-for="(option,index) in options" :key="option">
                              <div>
                                  <div @click="select(index,$event)" class="cursor-pointer w-full border-gray-100 rounded-t border-b hover:bg-green-100">
                                      <div x-bind:class="option.selected ? 'border-green-600' : ''" class="flex w-full items-center p-2 pl-2 border-transparent border-l-4 relative">
                                          <div class="w-full items-center flex">
                                              <div class="mx-2 leading-tight text-sm" x-model="option" x-text="option.text"></div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </template>
                      </div>
                  </div>
              </div> <!--Fin Desplegable  -->

          </div>
          <!-- on tailwind components page will no work  -->
         </div>
        </form>
      </div>
      

      <script>
          function dropdown() {
              return {
                  options: [],
                  selected: [],
                  show: false,
                  open() { this.show = true },
                  close() { this.show = false },
                  isOpen() { return this.show === true },
                  select(index, event) {

                      if (!this.options[index].selected) {

                          this.options[index].selected = true;
                          this.options[index].element = event.target;
                          this.selected.push(index);

                      } else {
                          this.selected.splice(this.selected.lastIndexOf(index), 1);
                          this.options[index].selected = false
                      }
                  },
                  remove(index, option) {
                      this.options[option].selected = false;
                      this.selected.splice(index, 1);


                  },
                  loadOptions() {
                      const options = document.getElementById('select').options;
                      for (let i = 0; i < options.length; i++) {
                          this.options.push({
                              value: options[i].value,
                              text: options[i].innerText,
                              selected: options[i].getAttribute('selected') != null ? options[i].getAttribute('selected') : false
                          });
                      }


                  },
                  selectedValues(){
                      return this.selected.map((option)=>{
                          return this.options[option].value;
                      })
                  }
              }
          }
      </script>
</div>

    
                    <div class="flex flex-col mt-8">
                        <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
                            <div
                                class="align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200">
                                <table class="min-w-full">
                                    <thead>
                                        <tr>
                                            <th
                                                class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                                Name</th>
                                            <th
                                                class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                                Title</th>
                                            <th
                                                class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                                Status</th>
                                            <th
                                                class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                                Role</th>
                                            <th class="px-6 py-3 border-b border-gray-200 bg-gray-50"></th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white">
                                        <tr>
                                            <td class="px-4 py-1 border-b text-sm">Hola</td>
                                            <td class="px-4 py-1 border-b text-sm">Hola</td>
                                            <td class="px-4 py-1 border-b text-sm">Hola</td>
                                            <td class="px-4 py-1 border-b text-sm">Hola</td>
                                            <td class="px-4 py-1 border-b text-sm">Hola</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                        
    </div>
</main>
@endsection