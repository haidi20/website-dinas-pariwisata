<?php

namespace App\Repositories;

use App\Web\Models\Gallery;

class GalleryRepository 
{
    // image
    public function allImages()
    {
        return Gallery::where('type', 'image')->get();
    }

    public function paginateImages($limit = null)
    {
        return Gallery::where('type', 'image')->paginate($limit);
    }

    public function limitImages($limit)
    {
        return Gallery::where('type', 'image')->limit($limit)->get();
    }

    // end image

    //video

    public function allVideos($limit = null)
    {
        return Gallery::where('type', 'video')->paginate($limit);
    }

    public function limitVideos($limit = null)
    {
        return Gallery::where('type', 'video')->limit($limit)->get();
    }

    public function firstVideo()
    {
        return Gallery::where('type', 'video')->first();
    }

    public function baseSlugVideo($slug = null)
    {
        $video = Gallery::where('type', 'video')->where('slug', $slug);

        $video->increment('read');

        return $video->first();
    }

    public function withoutThisVideo($id = null, $limit = null)
    {
        return Gallery::where('type', 'video')->where('id', '!=', $id)->limit($limit)->get();
    }

    public function createCommentVideo($comment_thread_id, $comment_content)
    {
        $client = new \Google_Client();
        $client->setApplicationName('API code samples');
        $client->setScopes([
            'https://www.googleapis.com/auth/youtube.force-ssl',
        ]);

        // TODO: For this request to work, you must replace
        //       "YOUR_CLIENT_SECRET_FILE.json" with a pointer to your
        //       client_secret.json file. For more information, see
        //       https://cloud.google.com/iam/docs/creating-managing-service-account-keys
        $client->setAuthConfig(base_path().'/client_secret_480303218320-t5f67643c8c2f8873a7ghlc0rqp2j888.apps.googleusercontent.com.json');
        $client->setAccessType('offline');

        // Request authorization from the user.
        $authUrl = $client->createAuthUrl();
        // printf("Open this link in your browser:\n%s\n", $authUrl);
        // print('Enter verification code: ');
        // $authCode = trim(fgets(STDIN));
        $authCode = redirect($authUrl);

        // Exchange authorization code for an access token.
        $accessToken = $client->fetchAccessTokenWithAuthCode($authCode);
        $client->setAccessToken($accessToken);

        // Define service object for making API requests.
        $service = new \Google_Service_YouTube($client);

        // Define the $comment object, which will be uploaded as the request body.
        $comment = new \Google_Service_YouTube_Comment();

        // Add 'snippet' object to the $comment object.
        $commentSnippet = new \Google_Service_YouTube_CommentSnippet();
        $commentSnippet->setParentId($comment_thread_id);
        $commentSnippet->setTextOriginal($comment_content);
        $comment->setSnippet($commentSnippet);

        $response = $service->comments->insert('snippet', $comment);
        print_r($response);
    }
}