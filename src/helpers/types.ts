export type UserSessionType = {
  auth_user_id: string,
  auth_user_role: string,
  auth_login_type: string
}

export type TmpUserSessionType = {
  auth_user_id: string,
  auth_user_role: string,
  auth_login_type: string
}

export type UserAccountType = {
  user_id: string;
  user_name: string | null;
  password: string | null;
  email_address: string;
  contact_no: string | null;
  full_name: string;
  created_at: string;
  updated_at: string | null;
  gender: string | null;
  city: string | null;
  address: string | null;
  role: string;
  faculty_id: string | null;
  pricing: string | null;
  oauth_google: string | null;
  oauth_facebook: string | null;
  status: string;
};
