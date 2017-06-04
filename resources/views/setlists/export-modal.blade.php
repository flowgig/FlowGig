<div class="modal export-setlist-modal">
    <div class="modal-container">
        <div class="modal-header">
            Export setlist:
            <button class="modal-close toggle-modal"
                    value="export-setlist-modal"></button>
        </div>
        <div class="modal-content">
            <p>Toggle fields in setlist</p>
            <form action="{{ route('setlists.export', $setlist) }}" method="GET" target="_blank">
                <div class="input-group">
                    <input type="checkbox" name="key" id="key" checked/>
                    <label for="key">Key</label>
                </div>
                <div class="input-group">
                    <input type="checkbox" name="bpm" id="bpm"/>
                    <label for="bpm">BPM</label>
                </div>
                <div class="input-group">
                    <input type="checkbox" name="comment" id="comment" checked/>
                    <label for="comment">Comment</label>
                </div>
                <div class="input-group float-right">
                    <fieldset>
                        <legend>Create PDF</legend>
                        <button type="submit" name="create-pdf" value="stream"
                                title="View {{ $setlist->gig->name }} as PDF"
                                class="button button-flat button-default tooltip">
                            View in new tab
                        </button>
                        <button type="submit" name="create-pdf" value="download"
                                title="Download {{ $setlist->gig->name }} as PDF"
                                class="button button-flat button-default tooltip">
                            Download
                        </button>
                    </fieldset>
                </div>
            </form>
        </div>
    </div>
</div>
