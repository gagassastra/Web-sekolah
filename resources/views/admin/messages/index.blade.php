@extends('layouts.admin', [
    'title' => 'Pesan Masuk',
    'header' => 'Pesan Kontak & Pengunjung'
])

@section('content')
<div class="space-y-6">
    
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h2 class="text-base font-bold text-navy-900">Daftar Pesan Masuk Website</h2>
            <p class="text-xs text-slate-500">Pertanyaan dan formulir kontak yang dikirim oleh masyarakat.</p>
        </div>
    </div>

    <!-- Status Tabs -->
    <div class="flex items-center gap-2 text-xs">
        <a href="{{ route('admin.messages.index') }}"
           class="px-3.5 py-2 rounded-xl font-bold transition {{ !request('status') ? 'bg-navy-900 text-white shadow-xs' : 'bg-white text-slate-600 hover:bg-slate-50 border border-slate-200' }}">
            Semua Pesan ({{ \App\Models\ContactMessage::count() }})
        </a>
        <a href="{{ route('admin.messages.index', ['status' => 'unread']) }}"
           class="px-3.5 py-2 rounded-xl font-bold transition {{ request('status') == 'unread' ? 'bg-gold-400 text-navy-950 shadow-xs' : 'bg-white text-slate-600 hover:bg-slate-50 border border-slate-200' }}">
            Belum Dibaca ({{ $unreadCount }})
        </a>
        <a href="{{ route('admin.messages.index', ['status' => 'read']) }}"
           class="px-3.5 py-2 rounded-xl font-bold transition {{ request('status') == 'read' ? 'bg-primary-600 text-white shadow-xs' : 'bg-white text-slate-600 hover:bg-slate-50 border border-slate-200' }}">
            Sudah Dibaca
        </a>
    </div>

    <!-- Table -->
    <div class="bg-white rounded-2xl shadow-sm border border-slate-200/80 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs">
                <thead class="bg-slate-50 text-slate-600 uppercase font-bold text-[10px] tracking-wider border-b border-slate-200">
                    <tr>
                        <th class="px-6 py-3.5">Pengirim</th>
                        <th class="px-6 py-3.5">Subjek & Cuplikan Pesan</th>
                        <th class="px-6 py-3.5">Kontak</th>
                        <th class="px-6 py-3.5">Waktu</th>
                        <th class="px-6 py-3.5">Status</th>
                        <th class="px-6 py-3.5 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($messages as $msg)
                        <tr class="hover:bg-slate-50/80 transition {{ !$msg->is_read ? 'bg-blue-50/30 font-medium' : '' }}">
                            <td class="px-6 py-4">
                                <span class="block font-bold text-navy-900">{{ $msg->name }}</span>
                                <span class="block text-[11px] text-slate-400">{{ $msg->email }}</span>
                            </td>
                            <td class="px-6 py-4 max-w-sm">
                                <a href="{{ route('admin.messages.show', $msg->id) }}" class="block font-bold text-slate-900 hover:text-primary-600 line-clamp-1">
                                    {{ $msg->subject }}
                                </a>
                                <span class="text-[11px] text-slate-500 line-clamp-1 mt-0.5">{{ $msg->message }}</span>
                            </td>
                            <td class="px-6 py-4 text-slate-600 font-mono text-[11px]">
                                {{ $msg->phone ?? '-' }}
                            </td>
                            <td class="px-6 py-4 text-slate-400 text-[11px]">
                                {{ $msg->created_at->diffForHumans() }}
                            </td>
                            <td class="px-6 py-4">
                                @if(!$msg->is_read)
                                    <span class="px-2 py-0.5 rounded-full text-[10px] font-bold bg-gold-400 text-navy-950">
                                        Baru
                                    </span>
                                @else
                                    <span class="px-2 py-0.5 rounded-full text-[10px] font-bold bg-slate-100 text-slate-500">
                                        Dibaca
                                    </span>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-right">
                                <div class="flex items-center justify-end gap-2">
                                    <a href="{{ route('admin.messages.show', $msg->id) }}" class="p-1.5 text-primary-600 hover:bg-primary-50 rounded-lg transition" title="Buka Pesan">
                                        <i class="fa-solid fa-envelope-open-text text-xs"></i>
                                    </a>
                                    <form action="{{ route('admin.messages.destroy', $msg->id) }}" method="POST" onsubmit="return confirm('Hapus pesan ini?');" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="p-1.5 text-red-500 hover:bg-red-50 rounded-lg transition" title="Hapus">
                                            <i class="fa-solid fa-trash-can text-xs"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-8 text-center text-slate-500">
                                Belum ada pesan masuk.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="p-4 border-t border-slate-100">
            {{ $messages->links() }}
        </div>
    </div>

</div>
@endsection
