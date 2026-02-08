<x-layout title="Welcome">
    @forelse ($tasks as $task)
        <li> {{$task}} </li>
    @empty
       <p>There are no tasks!</p> 
    @endforelse

{{--     @unless(count($tasks))
        <p>
            There are no tasks!
        </p>
    @endunless
 --}}
</x-layout>
