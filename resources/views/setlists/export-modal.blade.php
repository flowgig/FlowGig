<div id="export-setlist" class="modal">
    <div class="modal-container">
        <div class="modal-header">
            Export setlist as PDF
            <button onclick="hideExportSetlistModal()" class="modal-close toggle-modal"></button>
        </div>
        <div class="modal-content">
            <p><b>Included song information:</b></p>
            <br />
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
                                title="View setlist as PDF"
                                class="button button-flat button-default tooltip">
                            View in new tab
                        </button>
                        <button type="submit" name="create-pdf" value="download"
                                title="Download setlist as PDF"
                                class="button button-flat button-default tooltip">
                            Download
                        </button>
                    </fieldset>
                </div>
            </form>
        </div>
    </div>
</div>
