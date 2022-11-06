<!-- <div id="comment">
    <div class="user-img" style="background-image: url(/bootstrapUser/images/avatarUser.jpg)"></div>
    <div class="desc">
        <h4>
            <span class="text-left">A</span>
            <span class="text-right">cb</span>
        </h4>
</div> -->
<ul id="comment-list">
    @foreach($product->comments as $comment)
    <li class="comment">
        <div class="vcard bio">
            <img width="20%" src="/bootstrapUser/images/person_1.jpg" alt="Image placeholder">
        </div>
        <div class="comment-body">
            <h3>{{$comment->user->name}}</h3>
            <div class="meta">{{$comment->created_at}}</div>
            <p>{{$comment->content}}</p>

        </div>
    </li>
    @endforeach

</ul>