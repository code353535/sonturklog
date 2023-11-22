<x-admin.layout>

    <div class="main-content">
        <div class="page-content dark:bg-zinc-700">

            <div class="container-fluid px-[0.625rem]">

                <div class="grid grid-cols-1 mb-5">
                    <div class="flex items-center justify-between">
                        <h4 class="mb-sm-0 text-xl font-semibold grow text-gray-800 dark:text-gray-100">Kullanıcı Güncelle</h4>

                    </div>
                </div>


                <div class="grid">
                    <div class="card dark:bg-zinc-800 dark:border-zinc-600">

                        <div class="card-body">
                            <div class="grid grid-cols-2 gap-6">
                                <form method="post" action="{{ route('admin.update', ['user' => $user]) }}">
                                    @csrf
                                    @method('put')

                                    <div class="mb-6">
                                        <label for="example-text-input" class="block font-medium text-gray-700 dark:text-gray-100 mb-2">Kullanıcı Adı</label>
                                        <input class="w-full rounded border-gray-100 placeholder:text-sm focus:border focus:border-violet-500 focus:ring-0 dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-100 dark:text-zinc-100" type="text" name="name" value="{{ $user->name }}" required>
                                    </div>
                                    <div class="mb-6">
                                        <label for="example-text-input" class="block font-medium text-gray-700 dark:text-gray-100 mb-2">Kullanıcı Email</label>
                                        <input class="w-full rounded border-gray-100 placeholder:text-sm focus:border focus:border-violet-500 focus:ring-0 dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-100 dark:text-zinc-100" type="text" name="email" value="{{ $user->email }}" required>
                                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                    </div>
                                    <div class="mb-6">
                                        <label for="example-text-input" class="block font-medium text-gray-700 mb-2">Kullanıcı Durumu</label>
                                        <select name="status" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                            <option value="{{ $user->status }}">{{ $user->status }}</option>
                                            @if ($user->status == 'active' )
                                            <option value="inactive">inactive</option>
                                            @else
                                            <option value="active">active</option>
                                            @endif
                                          </select>
                                          <x-input-error :messages="$errors->get('status')" class="mt-2" />
                                    </div>
                                    <div class="mb-6">
                                        <label for="example-text-input" class="block font-medium text-gray-700 mb-2">Kullanıcı Rolü</label>
                                        <select name="role" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                            <option value="{{ $user->role }}">{{ $user->role }}</option>
                                            @if ($user->role == 'admin' )
                                            <option value="user">user</option>
                                            @else
                                            <option value="admin">admin</option>
                                            @endif
                                          </select>
                                          <x-input-error :messages="$errors->get('role')" class="mt-2" />
                                    </div>

                                    <div class="mb-6">

                                        <button type="submit" rows="4" class="btn text-white bg-violet-500 border-violet-500 hover:bg-violet-600 hover:border-violet-600 focus:bg-violet-600 focus:border-violet-600 focus:ring focus:ring-violet-500/30 active:bg-violet-600 active:border-violet-600">Güncelle</button>
                                    </div>

                            </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </x-admin.layout>
