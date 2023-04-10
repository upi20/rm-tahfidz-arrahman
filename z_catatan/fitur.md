[] User Profile
[] Rombak artikel
    [] Super admin edit author
[] Vistor counter refresh perangkat



$view = path_view('pages.admin.kontak.faq');
$data = compact('page_attr', 'setting', 'view');
$data['compact'] = $data;
return view($view, $data);

@php
    $resource = resource_loader(
        blade_path: $view,
        params: [
            'can_update' => $can_update ? 'true' : 'false',
            'can_delete' => $can_delete ? 'true' : 'false',
            'page_title' => $page_attr['title'],
        ],
    );
@endphp
<script src="{{ $resource }}"></script>

$page_title


data-toggle="tooltip"

<i class="fas fa-edit"></i></button>
<i class="fas fa-trash"></i></button>
