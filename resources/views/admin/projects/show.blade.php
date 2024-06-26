@extends('layouts.app')
@section('content')

<div  class="container p-5">
    <div class="col-6">
        <div class="card ">
            <div class="card-header">
                <div class="card-title">
                    <p class="fst-italic"><span class="fw-bold">Name:</span> {{$project->project_name}}</p>
                </div>
                <p class="fst-italic"><span class="fw-bold">Slug:</span> {{$project->slug}}</p>
                <p class="fst-italic"><span class="fw-bold">Description:</span> {{$project->description}}</p>
                <p class="fst-italic"><span class="fw-bold">Type:</span>{{ $project->type ? $project->type->name : '' }}
                </p>
                <div>
                    <ul class="d-flex gap-2 list-unstyled">
                        @foreach ($project->technologies as $technology)
                            <li> {{$technology->name}}</li>

                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="card-body">
                <p class="fst-italic"><span class="fw-bold">Working-Hours:</span> {{$project->working_hours}}</p>
                <p class="fst-itali"><span class="fw-bold">Co-Workers:</span> {{$project->co_workers}}</p>
                <div id="form" class="d-flex justify-content-center align-items-center gap-4">
                    <a class="btn btn-outline-warning" href="{{ route('admin.projects.edit', $project)}}">Edit</a>
                    <button class="btn btn-outline-danger " id="trash">Trash</button>
                </div>
            </div>
        </div>
        @if($project->type)
            <div class="container py-4">
                <h1>Related type project</h1>
                @foreach($project->type->projects as $related_project)
                    <div>

                        <ul>
                            @if($related_project->id !== $project->id)
                                <li>
                                    <h3><a href="{{ route('admin.projects.show', $related_project) }}">
                                            {{ $related_project->project_name }}
                                        </a></h3>
                                </li>
                            @endif
                        </ul>
                    </div>
                @endforeach
            </div>
        @endif

    </div>
</div>

<script>
    // let trashButtons = document.querySelector('.trash-button');
    // console.log(trashButtons);
    // trashButtons.forEach(function (button) {
    //     button.addEventListener('click', function () {
    //         console.log('Button clicked');
    //         let form = button.closest('form');
    //         let trashConf = confirm('Sei sicuro di voler eliminare il progetto?');
    //         console.log('Button clicked confirm');


    //         if (trashConf === true) {
    //             form?.submit();
    //         }
    //     });
    // });

    let trash = document.getElementById('trash')

    trash.addEventListener('click', function () {

    let form = document.getElementById('form')

    let trashConf = confirm('Sei sicuro di volere eliminare?')
        if (trashConf === true) {
            form.innerHTML  = '';
            form.innerHTML +=
            `
                <form action="{{ route('admin.projects.destroy', $project) }}" method="POST">
                @method('DELETE')
                 @csrf
    
                              
         
                <button type="submit" style="display:none;" id='confirm'>trash</button>
    
                </form>
            `
            let confirm = document.getElementById('confirm').click()

        };
    });



//     const deleteButton = document.querySelector('.trash-button');

//     deleteButton.addEventListener('click', function() {
//     // Trova l'ID o un altro identificatore univoco del progetto
    

//     // Esegui l'azione di eliminazione (ad esempio, rimuovi la riga dalla tabella)
    
//     if (deleteButton) {
        
//         console.log('Progetto eliminato con successo!');
//     }
// });

</script>


@endsection