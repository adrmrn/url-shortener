@extends('layouts.app')

<!-- Define page title -->
@section('title')
	Links List
@stop

<!-- Define page content -->
@section('content')

<div class="row">
<div class="col-md-12">
    <div class="card">
        <div class="header">
            <h4 class="title">All Links</h4>
            <p class="category">Here are your all shorter links</p>
        </div>
        <div class="content table-responsive table-full-width">
            <table class="table table-striped table-dashboard">
                <thead>
                    <th>#</th>
                    <th>Short URL</th>
                    <th>URL</th>
                    <th>Description</th>
                    <th class="text-center">Clicks</th>
                    <th class="text-center">Edit</th>
                    <th class="text-center">Remove</th>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>short.es/ThbX85z</td>
                        <td>http://planyzajec.ue.katowice.pl/plan/pla...</td>
                        <td>Lesson plan at the University</td>
                        <td class="text-center">369</td>
                        <td class="text-center"><a href="#" class="manage-icons"><i class="ti-pencil"></i></a></td>
                        <td class="text-center"><a href="#" class="manage-icons"><i class="ti-trash"></i></a></td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>short.es/vBnM451</td>
                        <td>http://allegro.pl/strefaokazji/kurtka-meska...</td>
                        <td>Jacket for men</td>
                        <td class="text-center">187</td>
                        <td class="text-center"><a href="#" class="manage-icons"><i class="ti-pencil"></i></a></td>
                        <td class="text-center"><a href="#" class="manage-icons"><i class="ti-trash"></i></a></td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>short.es/6Rn23iU</td>
                        <td>https://online.t-mobilebankowe.pl/ib/login...</td>
                        <td>Login page</td>
                        <td class="text-center">81</td>
                        <td class="text-center"><a href="#" class="manage-icons"><i class="ti-pencil"></i></a></td>
                        <td class="text-center"><a href="#" class="manage-icons"><i class="ti-trash"></i></a></td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>short.es/ThbX85z</td>
                        <td>http://planyzajec.ue.katowice.pl/plan/pla...</td>
                        <td>Lesson plan at the University</td>
                        <td class="text-center">369</td>
                        <td class="text-center"><a href="#" class="manage-icons"><i class="ti-pencil"></i></a></td>
                        <td class="text-center"><a href="#" class="manage-icons"><i class="ti-trash"></i></a></td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>short.es/vBnM451</td>
                        <td>http://allegro.pl/strefaokazji/kurtka-meska...</td>
                        <td>Jacket for men</td>
                        <td class="text-center">187</td>
                        <td class="text-center"><a href="#" class="manage-icons"><i class="ti-pencil"></i></a></td>
                        <td class="text-center"><a href="#" class="manage-icons"><i class="ti-trash"></i></a></td>
                    </tr>
                    <tr>
                        <td>6</td>
                        <td>short.es/6Rn23iU</td>
                        <td>https://online.t-mobilebankowe.pl/ib/login...</td>
                        <td>Login page</td>
                        <td class="text-center">81</td>
                        <td class="text-center"><a href="#" class="manage-icons"><i class="ti-pencil"></i></a></td>
                        <td class="text-center"><a href="#" class="manage-icons"><i class="ti-trash"></i></a></td>
                    </tr>
                    <tr>
                        <td>7</td>
                        <td>short.es/6Rn23iU</td>
                        <td>https://online.t-mobilebankowe.pl/ib/login...</td>
                        <td>Login page</td>
                        <td class="text-center">81</td>
                        <td class="text-center"><a href="#" class="manage-icons"><i class="ti-pencil"></i></a></td>
                        <td class="text-center"><a href="#" class="manage-icons"><i class="ti-trash"></i></a></td>
                    </tr>
                    <tr>
                        <td>8</td>
                        <td>short.es/ThbX85z</td>
                        <td>http://planyzajec.ue.katowice.pl/plan/pla...</td>
                        <td>Lesson plan at the University</td>
                        <td class="text-center">369</td>
                        <td class="text-center"><a href="#" class="manage-icons"><i class="ti-pencil"></i></a></td>
                        <td class="text-center"><a href="#" class="manage-icons"><i class="ti-trash"></i></a></td>
                    </tr>
                    <tr>
                        <td>9</td>
                        <td>short.es/vBnM451</td>
                        <td>http://allegro.pl/strefaokazji/kurtka-meska...</td>
                        <td>Jacket for men</td>
                        <td class="text-center">187</td>
                        <td class="text-center"><a href="#" class="manage-icons"><i class="ti-pencil"></i></a></td>
                        <td class="text-center"><a href="#" class="manage-icons"><i class="ti-trash"></i></a></td>
                    </tr>
                    <tr>
                        <td>10</td>
                        <td>short.es/6Rn23iU</td>
                        <td>https://online.t-mobilebankowe.pl/ib/login...</td>
                        <td>Login page</td>
                        <td class="text-center">81</td>
                        <td class="text-center"><a href="#" class="manage-icons"><i class="ti-pencil"></i></a></td>
                        <td class="text-center"><a href="#" class="manage-icons"><i class="ti-trash"></i></a></td>
                    </tr>
                </tbody>
            </table>

            <nav class="text-center" aria-label="Page navigation">
                <ul class="pagination">
                    <li class="disabled">    
                        <a href="#" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                    <li class="active"><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">5</a></li>
                    <li>
                        <a href="#" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>

@stop