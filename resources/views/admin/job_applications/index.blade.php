@extends('layouts.admin')

@section('title', 'Applications Received')

@section('content')
    {{-- Careers navigation tabs --}}
    <div class="admin-tabs" style="margin-bottom: 24px; display: flex; gap: 20px; border-bottom: 2px solid var(--border); padding-bottom: 2px;">
        <a href="{{ route('admin.jobs.index') }}" class="tab-link" style="font-weight: 500; font-size: 15px; color: var(--muted); text-decoration: none; padding: 8px 12px; transition: all 0.2s ease;">Job Openings</a>
        <a href="{{ route('admin.job-applications.index') }}" class="tab-link active" style="font-weight: 700; font-size: 15px; color: #7c3aed; text-decoration: none; border-bottom: 3px solid #7c3aed; padding: 8px 12px; margin-bottom: -2px;">Applications Received</a>
    </div>

    <div class="card" style="background: #ffffff; border-radius: 10px; border: 1px solid #e5e7eb; padding: 24px; box-shadow: 0 2px 10px rgba(0,0,0,0.03); width: 100%;">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 24px; flex-wrap: wrap; gap: 16px;">
            <div>
                <h2 style="margin: 0; font-size: 18px; font-weight: 700; color: #334155;">Applications Received</h2>
                @if (!empty($selectedJobTitle))
                    <div style="font-size: 13px; color: #7c3aed; margin-top: 4px; font-weight: 600;">
                        Filtered by position: {{ $selectedJobTitle }} (<a href="{{ route('admin.job-applications.index') }}" style="color: #64748b; text-decoration: underline;">Clear Filter</a>)
                    </div>
                @endif
            </div>

            {{-- Status Filter Dropdown --}}
            <div>
                <form method="GET" action="{{ route('admin.job-applications.index') }}" id="statusFilterForm">
                    @if(!empty($selectedJobTitle))
                        <input type="hidden" name="job_title" value="{{ $selectedJobTitle }}">
                    @endif
                    <select name="status" onchange="this.form.submit()" style="padding: 8px 16px; border-radius: 6px; border: 1px solid #cbd5e1; background: #ffffff; color: #334155; font-size: 13px; font-weight: 600; outline: none; cursor: pointer;">
                        <option value="">All Applications</option>
                        <option value="Applied" {{ ($selectedStatus ?? '') === 'Applied' ? 'selected' : '' }}>Applied</option>
                        <option value="Shortlisted" {{ ($selectedStatus ?? '') === 'Shortlisted' ? 'selected' : '' }}>Shortlisted</option>
                        <option value="Interview Scheduled" {{ ($selectedStatus ?? '') === 'Interview Scheduled' ? 'selected' : '' }}>Interview Scheduled</option>
                        <option value="Hired" {{ ($selectedStatus ?? '') === 'Hired' ? 'selected' : '' }}>Hired</option>
                        <option value="Interview Rejected" {{ ($selectedStatus ?? '') === 'Interview Rejected' ? 'selected' : '' }}>Interview Rejected</option>
                    </select>
                </form>
            </div>
        </div>

        @if ($applications->isEmpty())
            <p class="empty-state" style="padding: 40px; text-align: center; color: var(--muted);">No job applications found.</p>
        @else
            <div class="table-wrap" style="overflow-x: auto;">
                <table class="admin-table" style="width: 100%; border-collapse: collapse; font-size: 14px;">
                    <thead>
                        <tr style="border-bottom: 2px solid #f1f5f9; background: #fafafa;">
                            <th style="padding: 12px 14px; text-align: left; color: #475569; font-weight: 600; width: 40px;">#</th>
                            <th style="padding: 12px 14px; text-align: left; color: #475569; font-weight: 600;">Applicant</th>
                            <th style="padding: 12px 14px; text-align: left; color: #475569; font-weight: 600;">Email</th>
                            <th style="padding: 12px 14px; text-align: left; color: #475569; font-weight: 600;">Phone</th>
                            <th style="padding: 12px 14px; text-align: left; color: #475569; font-weight: 600;">Applied On</th>
                            <th style="padding: 12px 14px; text-align: center; color: #475569; font-weight: 600; width: 170px;">Status</th>
                            <th style="padding: 12px 14px; text-align: center; color: #475569; font-weight: 600; width: 150px;">Resume</th>
                            <th style="padding: 12px 14px; text-align: center; color: #475569; font-weight: 600; width: 90px;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($applications as $app)
                            <tr style="border-bottom: 1px solid #f1f5f9; transition: background 0.15s ease;" onmouseover="this.style.background='#faf5ff'" onmouseout="this.style.background='transparent'">
                                <td style="padding: 14px; color: #64748b; font-weight: 600;">{{ $loop->iteration }}</td>
                                <td style="padding: 14px; color: #334155; font-weight: 600;">
                                    {{ $app->name }}
                                    <div style="font-size: 11px; color: #94a3b8; font-weight: 500;">Position: {{ $app->job_title }}</div>
                                </td>
                                <td style="padding: 14px;">
                                    <a href="mailto:{{ $app->email }}" style="color: #4f46e5; text-decoration: underline; font-size: 13px;">
                                        {{ $app->email }}
                                    </a>
                                </td>
                                <td style="padding: 14px; color: #475569; font-size: 13px;">{{ $app->phone ?? '—' }}</td>
                                <td style="padding: 14px; color: #64748b; font-size: 13px;">
                                    {{ $app->created_at->format('d M Y, h:i A') }}
                                </td>
                                <td style="padding: 14px; text-align: center;">
                                    <form method="POST" action="{{ route('admin.job-applications.update-status', $app) }}">
                                        @csrf
                                        @method('PATCH')
                                        <select name="status" onchange="this.form.submit()" style="padding: 6px 10px; border-radius: 6px; border: 1px solid #cbd5e1; background: #ffffff; color: #334155; font-size: 12px; font-weight: 600; outline: none; cursor: pointer; width: 100%;">
                                            <option value="Applied" {{ ($app->status ?? 'Applied') === 'Applied' ? 'selected' : '' }}>Applied</option>
                                            <option value="Shortlisted" {{ ($app->status ?? '') === 'Shortlisted' ? 'selected' : '' }}>Shortlisted</option>
                                            <option value="Interview Scheduled" {{ ($app->status ?? '') === 'Interview Scheduled' ? 'selected' : '' }}>Interview Scheduled</option>
                                            <option value="Hired" {{ ($app->status ?? '') === 'Hired' ? 'selected' : '' }}>Hired</option>
                                            <option value="Interview Rejected" {{ ($app->status ?? '') === 'Interview Rejected' ? 'selected' : '' }}>Interview Rejected</option>
                                        </select>
                                    </form>
                                </td>
                                <td style="padding: 14px; text-align: center;">
                                    @if ($app->cv_path)
                                        <div style="display: flex; gap: 6px; justify-content: center; align-items: center; flex-wrap: wrap;">
                                            <a href="{{ route('admin.job-applications.view-cv', $app) }}" target="_blank" style="display: inline-flex; align-items: center; gap: 4px; border: 1.5px solid #4338ca; color: #ffffff; background: #4338ca; font-weight: 700; font-size: 11px; padding: 6px 12px; border-radius: 6px; text-decoration: none; transition: all 0.2s ease; box-shadow: 0 2px 4px rgba(67, 56, 202, 0.2);" title="View CV PDF in new tab">
                                                📄 VIEW CV
                                            </a>
                                            <a href="{{ route('admin.job-applications.download', $app) }}" style="display: inline-flex; align-items: center; gap: 4px; border: 1.5px solid #cbd5e1; color: #475569; background: #f8fafc; font-weight: 700; font-size: 11px; padding: 6px 10px; border-radius: 6px; text-decoration: none; transition: all 0.2s ease;" title="Download CV File">
                                                📥
                                            </a>
                                        </div>
                                    @else
                                        <span style="color: #94a3b8; font-size: 12px;">No CV</span>
                                    @endif
                                </td>
                                <td style="padding: 14px; text-align: center;">
                                    <div style="display: flex; gap: 6px; justify-content: center; align-items: center;">
                                        <button type="button" onclick="showApplicantDetails('{{ addslashes($app->name) }}', '{{ addslashes($app->email) }}', '{{ addslashes($app->phone ?? '') }}', '{{ addslashes($app->job_title) }}', '{{ addslashes($app->cover_letter ?? '') }}', '{{ addslashes($app->portfolio_link ?? '') }}', '{{ $app->cv_path ? route('admin.job-applications.view-cv', $app) : '' }}', '{{ $app->cv_path ? route('admin.job-applications.download', $app) : '' }}')" title="View Candidate Details & CV" style="background: #7c3aed; color: #ffffff; width: 32px; height: 32px; border: none; border-radius: 6px; display: flex; align-items: center; justify-content: center; cursor: pointer; transition: transform 0.15s ease;" onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'">
                                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                                        </button>
                                        <form method="POST" action="{{ route('admin.job-applications.destroy', $app) }}" onsubmit="return confirm('Delete this job application permanently?')" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" title="Delete Candidate" style="background: #ef4444; color: #ffffff; width: 32px; height: 32px; border: none; border-radius: 6px; display: flex; align-items: center; justify-content: center; cursor: pointer; transition: transform 0.15s ease;" onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'">
                                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="pagination-wrap" style="margin-top: 20px;">{{ $applications->appends(request()->query())->links() }}</div>
        @endif
    </div>

    {{-- Candidate View Modal --}}
    <div id="applicantModal" style="display: none; position: fixed; inset: 0; background: rgba(15, 23, 42, 0.6); backdrop-filter: blur(4px); z-index: 9999; align-items: center; justify-content: center; padding: 20px;">
        <div style="background: #ffffff; border-radius: 12px; width: 100%; max-width: 550px; padding: 28px; box-shadow: 0 20px 25px -5px rgba(0,0,0,0.1); position: relative;">
            <button type="button" onclick="closeApplicantModal()" style="position: absolute; top: 18px; right: 18px; background: none; border: none; font-size: 20px; cursor: pointer; color: #64748b;">&times;</button>
            <h3 id="modalName" style="margin: 0 0 6px; color: #1e293b; font-size: 20px; font-weight: 700;"></h3>
            <p id="modalPosition" style="margin: 0 0 20px; color: #7c3aed; font-weight: 600; font-size: 14px;"></p>
            
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 12px; margin-bottom: 20px; background: #f8fafc; padding: 14px; border-radius: 8px;">
                <div>
                    <label style="font-size: 11px; color: #64748b; font-weight: 700; text-transform: uppercase;">Email</label>
                    <div id="modalEmail" style="color: #334155; font-size: 13px; font-weight: 600;"></div>
                </div>
                <div>
                    <label style="font-size: 11px; color: #64748b; font-weight: 700; text-transform: uppercase;">Phone</label>
                    <div id="modalPhone" style="color: #334155; font-size: 13px; font-weight: 600;"></div>
                </div>
            </div>

            {{-- CV Section in Modal --}}
            <div id="cvWrap" style="margin-bottom: 20px; display: none; background: #f5f3ff; border: 1px solid #ddd6fe; padding: 14px; border-radius: 8px;">
                <label style="font-size: 11px; color: #6d28d9; font-weight: 700; text-transform: uppercase; display: block; margin-bottom: 8px;">Candidate Resume / CV File</label>
                <div style="display: flex; gap: 10px; flex-wrap: wrap;">
                    <a id="modalViewCvBtn" href="#" target="_blank" style="display: inline-flex; align-items: center; gap: 6px; background: #7c3aed; color: #ffffff; padding: 8px 16px; border-radius: 6px; font-weight: 700; font-size: 13px; text-decoration: none; box-shadow: 0 2px 5px rgba(124,58,237,0.3);">
                        📄 Open & View CV (PDF)
                    </a>
                    <a id="modalDownloadCvBtn" href="#" style="display: inline-flex; align-items: center; gap: 6px; background: #ffffff; color: #334155; border: 1px solid #cbd5e1; padding: 8px 14px; border-radius: 6px; font-weight: 600; font-size: 13px; text-decoration: none;">
                        📥 Download File
                    </a>
                </div>
            </div>

            <div id="portfolioWrap" style="margin-bottom: 20px; display: none;">
                <label style="font-size: 11px; color: #64748b; font-weight: 700; text-transform: uppercase; display: block; margin-bottom: 4px;">Portfolio / Website</label>
                <a id="modalPortfolio" href="#" target="_blank" style="color: #4f46e5; text-decoration: underline; font-size: 13px; font-weight: 600;"></a>
            </div>

            <div style="margin-bottom: 20px;">
                <label style="font-size: 11px; color: #64748b; font-weight: 700; text-transform: uppercase; display: block; margin-bottom: 6px;">Cover Letter</label>
                <div id="modalCoverLetter" style="background: #f8fafc; border: 1px solid #e2e8f0; padding: 14px; border-radius: 8px; font-size: 13px; color: #475569; line-height: 1.6; max-height: 180px; overflow-y: auto; white-space: pre-wrap;"></div>
            </div>

            <div style="text-align: right;">
                <button type="button" onclick="closeApplicantModal()" style="background: #64748b; color: #ffffff; border: none; padding: 8px 18px; border-radius: 6px; font-weight: 600; cursor: pointer;">Close</button>
            </div>
        </div>
    </div>

    <script>
        function showApplicantDetails(name, email, phone, position, coverLetter, portfolio, viewCvUrl, downloadCvUrl) {
            document.getElementById('modalName').innerText = name;
            document.getElementById('modalPosition').innerText = 'Applied Position: ' + position;
            document.getElementById('modalEmail').innerText = email;
            document.getElementById('modalPhone').innerText = phone || '—';
            document.getElementById('modalCoverLetter').innerText = coverLetter || 'No cover letter provided.';

            const cvWrap = document.getElementById('cvWrap');
            const modalViewCvBtn = document.getElementById('modalViewCvBtn');
            const modalDownloadCvBtn = document.getElementById('modalDownloadCvBtn');

            if (viewCvUrl && viewCvUrl.trim() !== '') {
                modalViewCvBtn.href = viewCvUrl;
                modalDownloadCvBtn.href = downloadCvUrl;
                cvWrap.style.display = 'block';
            } else {
                cvWrap.style.display = 'none';
            }

            const portfolioWrap = document.getElementById('portfolioWrap');
            const modalPortfolio = document.getElementById('modalPortfolio');
            if (portfolio && portfolio.trim() !== '') {
                modalPortfolio.href = portfolio;
                modalPortfolio.innerText = portfolio;
                portfolioWrap.style.display = 'block';
            } else {
                portfolioWrap.style.display = 'none';
            }

            document.getElementById('applicantModal').style.display = 'flex';
        }

        function closeApplicantModal() {
            document.getElementById('applicantModal').style.display = 'none';
        }
    </script>
@endsection
