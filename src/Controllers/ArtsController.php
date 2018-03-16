<?php

namespace Vadiasov\ArtsAdmin\Controllers;

use App\Album;
use App\Art;
use App\Http\Controllers\Controller;
use App\Track;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ArtsController extends Controller
{
    public function index($albumId)
    {
        $active = 'albums';
        $user   = Auth::user();
        $arts   = Art::whereAlbumId($albumId)
            ->whereTrackId(null)
            ->get();
        $album  = Album::whereId($albumId)->first();
        
        return view('arts-admin::index', compact(
            'active',
            'user',
            'arts',
            'album'
        ));
    }
    
    public function setCover($albumId, $artId)
    {
        $art        = Art::whereId($artId)->first();
        $art->cover = 1;
        $art->save();
        
        return redirect(action('\Vadiasov\ArtsAdmin\Controllers\ArtsController@index', $albumId))
            ->with('status', 'The album cover is selected. Don\'t forget delete other covers if they are.');
    }
    
    public function notCover($albumId, $artId)
    {
        $art        = Art::whereId($artId)->first();
        $art->cover = 0;
        $art->save();
        
        return redirect(action('\Vadiasov\ArtsAdmin\Controllers\ArtsController@index', $albumId))
            ->with('status', 'The album cover is deselected. Don\'t forget to select the album cover.');
    }
    
    public function destroy($albumId, $id)
    {
        $art = Art::whereId($id)->first();
        
        $art->delete();
        
        // second delete from disk
        $this->remove($art);
    
        return redirect(action('\Vadiasov\ArtsAdmin\Controllers\ArtsController@index', $albumId))
            ->with('status', 'The Art has been deleted.');
    }
    
    private function remove($art)
    {
        // second delete from disk
        Storage::delete('public/arts/' . $art->file);
        
        return true;
    }
    
    public function indexTrack($albumId, $trackId)
    {
        $active = 'albums';
        $user   = Auth::user();
        $arts   = Art::whereTrackId($trackId)->get();
        $album  = Album::whereId($albumId)->first();
        $track  = Track::whereId($trackId)->first();
        
        return view('arts-admin::indexTrack', compact(
            'active',
            'user',
            'arts',
            'album',
            'track'
        ));
    }
    
    public function setCoverTrack($albumId, $trackId, $artId)
    {
        $art        = Art::whereId($artId)->first();
        $art->cover = 1;
        $art->save();
        
        return redirect(action('\Vadiasov\ArtsAdmin\Controllers\ArtsController@indexTrack', [$albumId, $trackId]))
            ->with('status', 'The track cover is selected. Don\'t forget delete other covers if they are.');
    }
    
    public function notCoverTrack($albumId, $trackId, $artId)
    {
        $art        = Art::whereId($artId)->first();
        $art->cover = 0;
        $art->save();
        
        return redirect(action('\Vadiasov\ArtsAdmin\Controllers\ArtsController@indexTrack', [$albumId, $trackId]))
            ->with('status', 'The track cover is deselected. Don\'t forget to select the album cover.');
    }
    
    public function destroyTrack($albumId, $trackId, $id)
    {
        $art = Art::whereId($id)->first();
        
        $art->delete();
        
        // second delete from disk
        $this->remove($art);
        
        return redirect(action('\Vadiasov\ArtsAdmin\Controllers\ArtsController@indexTrack', [$albumId, $trackId]))
            ->with('status', 'The Art has been deleted.');
    }
}
