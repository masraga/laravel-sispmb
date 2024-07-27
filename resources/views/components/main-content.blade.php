@props([
"pageTitle"=> "",
"pageInfo"=>""
])

<div class="flex">
  <x-sidebar />
  <div class="flex-initial w-full">
    <x-top-nav />
    <div class="content-wrapper mt-2 bg-slate-100 min-h-[calc(100vh_-_5rem)] px-10 py-10">
      <div class="page-title">
        <div class="text-xl font-medium text-sky-900">{{$pageTitle}}</div>
        <div class="text-sm font-normal text-neutral-400 mt-1">{{$pageInfo}}</div>
      </div>
      <div class="page-content my-5">
        {{$slot}}
      </div>
    </div>
  </div>
</div>