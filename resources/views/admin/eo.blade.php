@section('title', 'Event Organizers')
@extends('layouts.admin-panel')

@section('content')
    <div class="page-heading">

        {{-- PAGE DESCRIPTION --}}
        {{--  --}}
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Event Organizers</h3>
                    <p class="text-subtitle text-muted">List of event organizers</p>
                </div>
            </div>
        </div>
        {{--  --}}
        {{-- END PAGE DESCRIPTION --}}



        {{-- DASHBOARD EVENT LIST --}}
        <section id="content-types">

            <script>
                function hideDetail() {
                    const detailEl = document.getElementById('eo-detail');
                    const listEl = document.getElementById('eo-list');

                    detailEl.classList.add('d-none');
                    listEl.classList.remove('col-md-6');
                    detailEl.classList.remove('col-md-6');

                }

                function getEODetail(id, name) {


                    // set table content 

                    const detailEl = document.getElementById('eo-detail');
                    const listEl = document.getElementById('eo-list');
                    const parseDataToView = (data) => `<tr>
                                <td>${data.name}</td>
                                <td>${data.description}</td>
                                <td><span class="badge bg-light-primary">${data.status ? data.status : '-'}</span></td>
                            </tr>`


                    detailEl.classList.remove('d-none');
                    listEl.classList.add('col-md-6');
                    detailEl.classList.add('col-md-6');

                    fetch(`/api/admin/organizer/events/${id}`)
                        .then(res => res.json())
                        .then(data => {
                            const detailTbody = document.getElementById('eo-detail-tbody')
                            const response = Array.from(data)

                            // set table title 
                            const tableTitle = document.getElementById('eo-name')
                            const tableSubtitle = document.getElementById('eo-total-events')
                            tableTitle.innerHTML = name
                            tableSubtitle.innerHTML = `${response.length} events`

                            if (response.length > 0) {
                                const dataToView = response.map(parseDataToView).join('')

                                detailTbody.innerHTML = dataToView
                            } else {
                                detailTbody.innerHTML = `<tr>
                                    <td class="text-center text-muted" colspan="3">This organizer has no events</td>
                                </tr>`
                            }
                        })


                }
            </script>

            <div class="row" id="basic-table">
                <div id="eo-list" style="cursor:pointer">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                <!-- Table with outer spacing -->
                                <div class="table-responsive" style="height: 80vh;overflow-y: scroll;">
                                    <table class="table table-lg table-hover">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Address</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data as $eo)
                                                <tr id="eo-list-{{ $eo->id }}">
                                                    <th scope="row">{{ $loop->iteration }}</th>
                                                    <td onclick="getEODetail({{ $eo->id }}, '{{ $eo['name'] }}')"
                                                        class="text-bold-500">
                                                        <a href="#" style="font-weight: bold">{{ $eo['name'] }}</a>
                                                    </td>
                                                    <td class="text-bold-500">{{ $eo['email'] }}</td>
                                                    <td>{{ $eo['address'] }}</td>
                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- description --}}
                <div id="eo-detail" class="d-none slide-in-right" style="height: 100vh; overflow-y: scroll;">
                    <div class="card">

                        <div class="card-content">

                            <div onclick="hideDetail()" class="d-flex justify-content-between">
                                <div class="card-header">
                                    <h4 id="eo-name"></h4>
                                    <span id="eo-total-events"></span>
                                </div>

                                <div class="mx-4 my-4 d-flex justify-content-center align-items-center"
                                    style="cursor:pointer;background-color:#f0f0f1;width:32px;height:32px;border-radius:50%;color:#25396f;">
                                    x
                                </div>
                            </div>
                            <!-- Table with no outer spacing -->
                            <div class="table-responsive" style="transition: all ease-in-out 0.3s;">
                                <table class="table mb-0 table-lg">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Description</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody id="eo-detail-tbody">
                                        {{-- dynamic content set from js --}}
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        {{-- END DASHBOARD EVENT LIST --}}

    </div>
@endsection
