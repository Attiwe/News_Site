 <!-- filter select Search by -->
 <div class="card-body">
                <form action="{{ route('admin.contact-us.index') }}" method="GET" >
                    @csrf
                    <div class="row">

                        <div class="col-2">
                            <div class="form-group">
                                <select class="form-control" name="search_by" id="">
                                    <option selected disabled> Search by </option>
                                    <option value="id">Id</option>
                                    <option value="name">Name</option>
                                    <option value="username">Username</option>
                                    <option value="email">Email</option>
                                    <option value="created_at">Created At</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-2">
                            <div class="form-group">
                                <select class="form-control" name="order_by" id="">
                                    <option selected disabled> Order by </option>
                                    <option value="asc">Ascending</option>
                                    <option value="desc">Descending</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-2">
                            <div class="form-group">
                                <select class="form-control" name="show"  id="">
                                    <option selected disabled> Show </option>
                                    <option value= 10>10</option>
                                    <option value= 20>20</option>
                                    <option value= 30>30</option>
                                    <option value= 40>40</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-2">
                            <div class="form-group">
                                <select class="form-control" name="status" id="">
                                    <option selected disabled> Status </option>
                                    <option value=1 > Read </option>
                                    <option value=0 >UnRead</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-3">
                            <div class="form-group">
                               <input  type="text" class="form-control" placeholder="Search......" name="keyword">
                            </div>
                        </div>

                        <div class="col-1">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Search</button>
                            </div>
                        </div>

                    </div>
                </form>
                
            </div>