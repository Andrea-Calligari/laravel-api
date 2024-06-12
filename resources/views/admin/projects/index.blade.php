@extends('layouts.app')

@section('content')

<section class="py-5">
  <div class="container">
    <table class="table table-dark table-hover">
      <thead>
        <tr>
          <th scope="col">Name</th>
          <th scope="col">Slug</th>
          <th scope="col">Description</th>
          <th width="100px" scope="col">Type</th>
          <th width="150px" scope="col">Working-hours</th>
          <th scope="col">Co-workers</th>
          <th colspan="2" scope="col"></th>

        </tr>
      </thead>
      <tbody>
        @foreach($projects as $project)
        <tr>
          <th scope="row">
          <a class="link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover"
            href="{{ route('admin.projects.show', $project) }}">
            {{ $project->project_name }}
          </a>
          </th>
          <td>{{ $project->slug }}</td>
          <td>{{ $project->description }}</td>
          <td>{{ $project->type ? $project->type->name : '' }}</t>
          <td class="fs-5">{{ $project->working_hours }}</td>
          <td>{{ $project->co_workers }}</td>
          <td>
            <a class="btn btn-outline-warning" href="{{ route('admin.projects.edit', $project) }}">Edit</a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>

  <script>

    const destroyButton = document.querySelector('.trash-button');
    destroyButton.addEventListener('click', function (vent){
      event.preventDefault();
        // console.log('Button clicked confirm')
        
        if (destroyButton) {
          destroyButton.submit();
        }
        // Mostro il popup
        // Mi attacco ai bottoni del popup
        // Se uno clicca SI
        // Scateno la submit

      });
    



    // let trashButtons = document.querySelectorAll('.trash-button');
    // console.log(trashButtons);
    // trashButtons.forEach(function (button) {
    //   button.addEventListener('click', function () {
    //     console.log('Button clicked');
    //     let form = button.closest('form');

    //   });

  </script>

</section>

@endsection