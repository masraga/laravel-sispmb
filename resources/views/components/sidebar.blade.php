<div class="sidebar z-10 flex-initial overflow-hidden w-96 bg-slate-100">
  <div class="brand py-5 px-5 text-left flex justify-between">
    <a href="" class="font-semibold text-2xl text-sky-900 flex"><x-heroicons::solid.academic-cap class="w-10 h-10 pr-2" /> <span class="pt-1">{{config("app.name")}}</span></a>
    <button class="toggle-sidebar"><x-heroicons::outline.bars-4 class="w-6 h-6" /></button>
  </div>
  <div class="nav mt-5 px-2">
    @role('admin')
    <x-side-link active="{{request()->routeIs('dashboard')}}" href="{{route('dashboard')}}">
      <x-heroicons::outline.home class="w-6 h-6" />
      <span class="ml-2">Dashboard</span>
    </x-side-link>
    @endrole
    @role('admin')
    <x-side-link active="{{request()->routeIs('faculty') || request()->routeIs('faculty.save')}}" href="{{route('faculty')}}">
      <x-heroicons::outline.building-office-2 class="w-6 h-6" />
      <span class="ml-2">Fakultas</span>
    </x-side-link>
    @endrole
    @role('admin')
    <x-side-link active="{{request()->routeIs('pmb') || request()->routeIs('pmb.save')}}" href="{{route('pmb')}}">
      <x-heroicons::outline.user-group class="w-6 h-6" />
      <span class="ml-2">PMB</span>
    </x-side-link>
    @endrole
    @role('mahasiswa')
    <x-side-link active="{{request()->routeIs('admin.pmb.candidat') || request()->routeIs('student.select-pmb') || request()->routeIs('student.pmb-detail')}}" href="{{route('student.select-pmb')}}">
      <x-heroicons::outline.user-group class="w-6 h-6" />
      <span class="ml-2">PMB</span>
    </x-side-link>
    @endrole
  </div>
</div>