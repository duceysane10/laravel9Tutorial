<style>
    nav svg{
        height: 20px;
    }
    nav .hidden{
        display: block;
    }
</style>

<div>
    <main class="main">
            <div class="page-header breadcrumb-wrap">
                <div class="container">
                    <div class="breadcrumb">
                        <a href="/" rel="nofollow">Home</a>
                        <span></span> Add New Category
                    </div>
                </div>
            </div>
            <section class="mt-50 mb-50">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col-md-6">
                                            Add New Contact
                                        </div>
                                        <div class="col-md-6" >
                                            <a href="/contact" class="btn btn-success float-end"> Add New Contact</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    @if(Session::has('deleted'))
                                    <div class="alert alert-success">
                                        <strong>Success | {{ Session::get('message') }}</strong>
                                    </div>
                                    @endif

                                    <table class="table-striped border:1" >
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Slug</th>
                                            <th>Action</th>
                                        </tr>
                                        <tbody>
                                                @php
                                                    $i=($contacts->currentPage()-1)*$contacts->perPage();
                                                @endphp
                                                @foreach ($contacts as $contact)
                                                   <tr>
                                                    <td>{{ ++$i }}</td>
                                                    <td>{{ $contact->name }}</td>
                                                    <td>{{ $contact->slug }}</td>
                                                    <td>
                                                        <a href="/contact" class="text-info">Edit</a>
                                                        <a href="#" class="text-danger"  onclick="deleteconfirmation({{$contact->id}})" style="margin-left:20px;">Delete</a>
                                                    </td>
                                                   </tr>
                                                @endforeach
                                        </tbody>
                                    </table>
                                    {{ $contacts->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
    </main>
</div>
<div class="modal" id="deleteModel">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body pb-30 pt-30">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h3 class="pb-3">Do you want To Delete this recocrd?</h3>
                        <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#deleteModel"> Cancel</button>
                        <button type="button" class="btn btn-danger" onclick="deleteContact()">Delete</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
    <script>
        function deleteconfirmation(id){
            @this.set('contact_id',id);
            $('#deleteModel').modal('show');
        }
        function deleteContact(){
            @this.call('deleteContact');
            $('#deleteModel').modal('hide');
        }
    </script>
@endpush
