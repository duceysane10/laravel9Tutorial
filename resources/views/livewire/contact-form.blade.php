
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 offset-md-3">
                            <div class="card">
                                   <div class="row">
                                    <div class="card-header">
                                        <h3>Add New Category</h3>
                                    </div>
                                    <div class="col-md-6" >
                                        <a href="/Allcontact" class="btn btn-success float-end"> All Contacts</a>
                                    </div>
                                   </div>
                                <div class="card-body">
                                    @if(Session::has('message'))
                                    <div class="alert alert-success">
                                        <strong>Success | {{Session::get('message')}}</strong>
                                    </div>
                                     @endif
                                    <form wire:submit.prevent="storeCategory">
                                        <div class="from-group">
                                            <label for="Category name" >Category name</label>
                                            <input type="text"  class="form-control" placeholder="enter category" wire:model="name" wire:keyup="genslug" />
                                            <div> @error('name'){{ $message }}@enderror </div>
                                        </div>
                                        <div class="from-group">
                                            <label for="Slug" >Slug</label>
                                            <input type="text" class="form-control" placeholder="enter slug" wire:model="slug" />
                                            <div> @error('slug'){{ $message }}@enderror </div>
                                        </div>
                                        <button type="submit"  class="btn btn-primary float-end">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
