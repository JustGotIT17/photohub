<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-6">
        <div class="panel panel-default">
            <div class="panel-heading clearfix">
                <h4 class="pull-left">Sales Monitoring</h4>
                <h6 class="pull-right text-green"><i class="fa fa-circle fa-fw"></i> Real-time</h6>
            </div>
            <div class="panel-body">
                <table class="table table-responsive table-hover">
                    <thead>
                        <tr>
                            <th>Branch ID</th>
                            <th>Branch Name</th>
                            <th>Sales Today</th>
                            <th>Total Sales</th>
                        </tr>
                    </thead>
                    <tbody>
                    @if(count($sales))
                        @foreach($sales as $row)
                        <tr>
                            <td>{{$row['id']}}</td>
                            <td><a href="/sales/branch/{{$row['id']}}">{{($row['name'])}}</a></td>
                            <td>{{ number_format($row['todayCount'], 0, '.', ',')}}</td>
                            <td>{{ number_format($row['totalCount'], 0, '.', ',')}}</td>
                        </tr>
                        @endforeach
                    @else
                        <tr>
                            <td><div class="alert alert-info">No record found.</div> </td>
                        </tr>
                    @endif
                    </tbody>
                </table>
            </div>

        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-6">
        <div class="panel panel-default">
            <div class="panel-heading clearfix">
                <h4 class="text-center pull-left">System Credits Monitoring</h4>
                <h6 class="pull-right text-green"><i class="fa fa-circle fa-fw"></i> Real-time</h6>
            </div>
            <div class="panel-body">
                <table class="table table-responsive table-hover">
                    <thead>
                        <tr>
                            <th>Branch ID</th>
                            <th>Branch Name</th>
                            <th>System Credits</th>
                        </tr>
                    </thead>
                    <tbody>
                     @if(count($creditList))
                        @foreach($creditList as $row)
                        <tr>
                            <td>{{$row->branch_id}}</td>
                            <td>{{($row->branch->name)}}</td>
                            <td>{{ number_format($row->amount, 2, '.', ',')}}</td>
                        </tr>
                        @endforeach
                     @else
                         <tr>
                             <td><div class="alert alert-info">No record found.</div> </td>
                         </tr>
                    @endif
                    </tbody>
                </table>
            </div>


        </div>
    </div>
</div>

